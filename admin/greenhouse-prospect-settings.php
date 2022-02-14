<?php 

class GreenhouseProspectSettings {
    function __construct() {
        add_action( 'admin_menu', array($this, 'ghpros_add_settings_page') );
        add_action( 'admin_init', array($this, 'ghpros_settings_fields') );
    }


    function ghpros_add_settings_page() {
        add_options_page( 'Greenhouse Prospects Settings', __('Greenhouse Prospects Settings', 'ghpros'), 'manage_options', 'ghpros-settings-page', array($this, 'ghpros_add_admin_html') );
    }
  
    function ghpros_settings_fields() {
        add_settings_section( 'ghpros_section', "Use the fields below to set up creditials for the Greenhouse Prospects API Call.", null, 'ghpros-settings-page' );
        add_settings_field( 'ghpros-authorization', 'Authorization Header', array($this, 'ghprosTextInputHtml'), 'ghpros-settings-page', 'ghpros_section', array('name' => 'ghpros-authorization') );
        register_setting( 'ghpros_settings', 'ghpros-authorization', array('sanitize_callback' => 'sanitize_text_field', 'default' => NULL) );
        add_settings_field( 'ghpros-on-behalf-of', 'On Behalf Of', array($this, 'ghprosTextInputHtml'), 'ghpros-settings-page', 'ghpros_section', array('name' => 'ghpros-on-behalf-of') );
        register_setting( 'ghpros_settings', 'ghpros-on-behalf-of', array('sanitize_callback' => 'sanitize_text_field', 'default' => NULL) );
    }

    function ghprosTextInputHtml( $args ) { ?>
        <input type="text" name="<?php echo $args['name'] ?>" value="<?php echo esc_attr( get_option( $args['name'] ) );?>">
    <?php
    }
  
    function ghpros_add_admin_html() { ?>
        <div class="wrap">
            <h2><?php _e( "Greenhouse Prospects Settings" ) ?></h2>
            <form action="options.php" method="POST">
                <?php 
                settings_fields( 'ghpros_settings' );
                do_settings_sections( 'ghpros-settings-page' ); 
                submit_button();
                ?>
            </form>
        </div>
    <?php
    }

}

$greenhouseProspectSettings = new GreenhouseProspectSettings();