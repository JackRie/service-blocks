<div <?php echo get_block_wrapper_attributes(); ?>>
    <form id="<?php echo esc_attr( $atts['formId'] )?>"></form>
    <div class="marketo-form-button">
        <button onclick="MktoForms2.loadForm('//lp.serviceexpress.com', '021-JNM-575', <?php echo esc_attr( $atts['formId'] )?>,
        function(form) { MktoForms2.lightbox(form).show(); });"><?php echo wp_kses_post($atts['buttonText'] ); ?></button>
    </div>
</div>