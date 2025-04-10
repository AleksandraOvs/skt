<?php if (! defined('WP_DEBUG')) {
	die('Direct access forbidden.');
}

function the_core_theme_enqueue()
{
	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('fonts-style', get_stylesheet_directory_uri() . '/fonts/fonts.css');
	wp_enqueue_style('swiper-style', get_stylesheet_directory_uri() . '/inc/swiper/swiper-bundle.min.css', array(), time());

	wp_deregister_script('jquery');
	wp_enqueue_script('parent-theme-jquery', get_stylesheet_directory_uri() . '/js/jquery.min.js', array(), null, true);
	wp_enqueue_script ('spin_scripts', get_stylesheet_directory_uri() . '/js/jquery.spincrement.min.js', array(), null, true);
	wp_enqueue_script('swiper-scripts', get_stylesheet_directory_uri() . '/inc/swiper/swiper-bundle.min.js', array(), null, true);
	wp_enqueue_script('slider-js', get_stylesheet_directory_uri() . '/inc/swiper/slider-scripts.js', array(), null, true);
	wp_enqueue_script('child-theme-script', get_stylesheet_directory_uri() . '/js/script.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'the_core_theme_enqueue');

add_filter('upload_size_limit', 'PBP_increase_upload');
function PBP_increase_upload($bytes)
{
	return 10485760; // 10 Mb
}

function custom_excerpt_length()
{
	$length = 20;
	return $length;
}
add_filter('excerpt_length', 'custom_excerpt_length');

/**
 * Initialization Carbon Fields
 */

require 'inc/carbon-fields/carbon-fields.php';

/**
 * Произвольный тип записи /для тестовой темы - нужно их убрать на рабочем сайте/
 */

 require 'inc/carbon-fields/post-type.php';
