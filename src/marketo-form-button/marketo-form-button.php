<?php 

return array('render_callback' => 'marketo_form_render_callback' );

function marketo_form_render_callback( $atts, $content, $block) {
	wp_enqueue_script('marketo-forms', "//lp.serviceexpress.com/js/forms2/js/forms2.min.js", [], '1.0.0', true);
	ob_start();

	require plugin_dir_path( __FILE__ ) . 'template/template.php';

	return ob_get_clean();
}
