<?php 
add_action( 'wp_ajax_ghpros_create_applicant', 'ghpros_create_applicant' );
add_action( 'wp_ajax_nopriv_ghpros_create_applicant', 'ghpros_create_applicant' );

function ghpros_create_applicant() {
    
    if( ! empty( $_POST ) && check_ajax_referer( 'ghpros_create_applicant', 'ghpros_nonce' ) ) {
   
      $body = ghpros_setup_request_body($_POST, $_FILES);
      $url = "https://webhook.site/0d304a5b-b094-4144-b0f6-397bff7f8115?";
      // $url = "https://harvest.greenhouse.io/v1/prospects"
      // $credentials = get_option('ghpros-authorization');
      // $b64_key = base64_encode($credentials . ':');
      // $on_behalf_of = get_option('ghpros-on-behalf-of');
      $request  = new WP_Http();
      $response = $request->post( $url, array( 
        // 'headers' => array(
        //   'Content-Type' => 'application/json',
        //   'Authorization' => 'Basic ' . $b64_key,
        //   'On-Behalf-Of' => $on_behalf_of
        // ),
          'body' => $body
        ) );
        wp_send_json_success( __('Response OK', 'serv-blocks') );

    } 
    
    wp_send_json_error( 'You are not allowed to perform this action', 'serv-blocks' );
}

function ghpros_setup_request_body($post, $files) {
    
    $body = array(
        'first_name' => sanitize_text_field( $post['first_name'] ),
        'last_name' => sanitize_text_field( $post['last_name'] ),
        'is_private' => false,
        'phone_numbers' => array(
            array(
            "value" => sanitize_text_field( $post['phone'] ), 
            "type" => "mobile"
            )
        ),
        'email_addresses' => array(
            array(
            "value" => sanitize_email( $post['email'] ), 
            "type" => "personal"
            )
        ),
    );

    if($post['website']) {
        $body['website_address'] = array();
        $website = array(
            "value" => sanitize_url( $post['website'] ), 
            "type" => "personal"
        );
        array_push($body['website_address'], $website);
    }
    if($post['linkedin']) {
        $body['social_media_addresses'] = array();
        $linkedin = array(
            "value" => sanitize_url( $post['linkedin'] ), 
            "type" => "personal"
        );
        array_push($body['social_media_addresses'], $linkedin);
    }
    if( isset($files['resume']['name']) || isset($files['cover_letter']['name']) ) {
        $body['application'] = array(
            'attachments' => array()
        );
    }
    if( isset($files['resume']['name']) ) {
        $uploaded_resume_file = wp_upload_bits( $files['resume']['name'], null, @file_get_contents( $files['file']['tmp_name'] ) );
        $resume = array(
            'filename' => $files['resume']['name'],
            'type' => "resume",
            'content' => $uploaded_resume_file['url'],
            'content_type' => $uploaded_resume_file['type']
        );
        array_push($body['application']['attachments'], $resume);
    }
    if( isset($files['cover_letter']['name']) ) {
        $uploaded_cover_letter_file = wp_upload_bits( $files['cover_letter']['name'], null, @file_get_contents( $files['file']['tmp_name'] ) );
        $cover_letter = array(
            'filename' => $files['cover_letter']['name'],
            'type' => "cover_letter",
            'content' => $uploaded_cover_letter_file['url'],
            'content_type' => $uploaded_cover_letter_file['type']
        );
        array_push($body['application']['attachments'], $cover_letter);
    }

    return json_encode($body);
}