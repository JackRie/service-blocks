<?php 

return array('render_callback' => 'greenhouse_prospect_render_callback' );

function greenhouse_prospect_render_callback( $atts, $content, $block) {
	wp_enqueue_script( 'ghpros-script', SERV_BLOCKS_URL . 'build/greenhouse-prospect/view.js', array('jquery-form'), '1.0.0', true );
	ob_start();

	require plugin_dir_path( __FILE__ ) . 'template/template.php';

	return ob_get_clean();
}
