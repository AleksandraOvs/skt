<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$shortcodes       = fw_ext( 'shortcodes' );
$shortcode        = $shortcodes->get_shortcode( 'fw_custom_posts' );
$the_core_version = fw()->theme->manifest->get_version();

wp_enqueue_script(
	'fw-custom-posts-script',
	$shortcode->locate_URI( '/static/js/scripts.js' ),
	array( 'jquery' ),
	$the_core_version,
	true
);

