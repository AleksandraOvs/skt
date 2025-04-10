<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


if ( ! function_exists( 'the_core_disable_default_shortcodes' ) ) :
	function the_core_disable_default_shortcodes( $to_disabled ) {
		$to_disabled[] = 'call_to_action';
		$to_disabled[] = 'notification';

		if ( ! class_exists( 'RevSlider' ) ) {
			$to_disabled[] = 'revolution_slider';
		}

		if ( ! function_exists( 'fw_ext_breadcrumbs' ) ) {
			$to_disabled[] = 'fw_breadcrumbs';
		}

		if ( ! fw_ext( 'portfolio' ) ) {
			$to_disabled[] = 'portfolio';
		}

		if ( ! class_exists( 'RGFormsModel' ) ) {
			$to_disabled[] = 'fw_gravityforms';
		}

		return $to_disabled;
	}
endif;
add_filter( 'fw_ext_shortcodes_disable_shortcodes', 'the_core_disable_default_shortcodes', 10, 2 );


if ( ! function_exists( 'the_core_ajax_get_shortcode_posts' ) ) :
	function the_core_ajax_get_shortcode_posts() {
		$blog_type      = isset( $_POST['blog_type'] ) ? $_POST['blog_type'] : 'blog-1';
		$blog_view      = isset( $_POST['blog_view'] ) ? $_POST['blog_view'] : '';
		$columns        = isset( $_POST['columns'] ) ? $_POST['columns'] : '';
		$posts_per_page = isset( $_POST['posts_per_page'] ) ? $_POST['posts_per_page'] : 5;
		$category       = isset( $_POST['category'] ) ? $_POST['category'] : 0;
		$page           = isset( $_POST['page'] ) ? $_POST['page'] : 2;
		$lang           = isset( $_POST['lang'] ) ? $_POST['lang'] : '';
		$extra          = isset( $_POST['extra'] ) ? ( $_POST['extra'] ) : '';
		$extra_options  = ! empty( $extra ) ? unserialize( base64_decode( $extra ) ) : array();

		if ( function_exists( 'icl_object_id' ) && !empty($lang) ) {
			do_action( 'wpml_switch_language', $lang );
		}

		if ( $category == 0 ) {
			$args = array(
				'posts_per_page' => $posts_per_page,
				'post_type'      => 'post',
				'post_status'    => 'publish',
				'paged'          => $page,
				'orderby'        => 'date',
				'suppress_filters' => false,
			);
		} else {
			$args = array(
				'posts_per_page' => $posts_per_page,
				'post_type'      => 'post',
				'post_status'    => 'publish',
				'paged'          => $page,
				'orderby'        => 'date',
				'suppress_filters' => false,
				'tax_query'      => array(
					array(
						'taxonomy' => 'category',
						'field'    => 'term_id',
						'terms'    => $category
					)
				)
			);
		}
		$query = new WP_Query( $args );

		$sidebar_position  = ( $columns == 'fw-portfolio-cols-3' || $columns == 'fw-portfolio-cols-4' ) ? 'full' : 'right';
		$the_core_wrap_div = the_core_get_blog_wrap( $blog_view, $sidebar_position, $columns );

		$html_posts = '';
		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) : $query->the_post();
				$html_posts .= $the_core_wrap_div['start'];
				if ( $post_format = get_post_format() ) {
					$html_posts .= the_core_render_view( fw_locate_theme_path( '/templates/' . $blog_type . '/content-' . $post_format . '.php' ), $extra_options );
				} else {
					$html_posts .= the_core_render_view( fw_locate_theme_path( '/templates/' . $blog_type . '/content.php' ), $extra_options );
				}
				$html_posts .= $the_core_wrap_div['end'];
			endwhile;
		endif;

		echo json_encode( array( 'html' => $html_posts ) );
		die();
	}
endif;
add_action( 'wp_ajax_the_core_ajax_get_shortcode_posts', 'the_core_ajax_get_shortcode_posts' );
add_action( 'wp_ajax_nopriv_the_core_ajax_get_shortcode_posts', 'the_core_ajax_get_shortcode_posts' );



if ( ! function_exists( 'the_core_ajax_get_shortcode_custom_posts' ) ) :
	function the_core_ajax_get_shortcode_custom_posts() {
		$columns        = isset( $_POST['columns'] ) ? $_POST['columns'] : '';
		$posts_per_page = isset( $_POST['posts_per_page'] ) ? $_POST['posts_per_page'] : 5;
		$post_type      = isset( $_POST['post_type'] ) ? $_POST['post_type'] : 'post';
		$page           = isset( $_POST['page'] ) ? $_POST['page'] : 2;
		$extra          = isset( $_POST['extra'] ) ? ( $_POST['extra'] ) : '';
		$lang           = isset( $_POST['lang'] ) ? $_POST['lang'] : '';
		$extra_options  = ! empty( $extra ) ? unserialize( base64_decode( $extra ) ) : array();

		$valid_post_types = the_core_get_post_types();
		if ( ! array_key_exists($post_type, $valid_post_types) ) {
			die();
		}

		if ( function_exists( 'icl_object_id' ) && !empty($lang) ) {
			do_action( 'wpml_switch_language', $lang );
		}

		$args = array(
			'posts_per_page' => $posts_per_page,
			'post_type'      => $post_type,
			'post_status'    => 'publish',
			'paged'          => $page,
			'suppress_filters' => false,
			'orderby'        => 'date'
		);
		$query = new WP_Query( $args );

		$the_core_wrap_div = the_core_get_blog_wrap('grid', 'full', $columns );

		$shortcodes   = fw_ext( 'shortcodes' );
		$shortcode    = $shortcodes->get_shortcode( 'fw_custom_posts' );
		$sh_view_path = $shortcode->locate_path('/views/content.php');

		$html_posts = '';
		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) : $query->the_post();
				$html_posts .= $the_core_wrap_div['start'];
				$html_posts .= the_core_render_view( $sh_view_path, $extra_options );
				$html_posts .= $the_core_wrap_div['end'];
			endwhile;
		endif;

		echo json_encode( array( 'html' => $html_posts ) );
		die();
	}
endif;
add_action( 'wp_ajax_the_core_ajax_get_shortcode_custom_posts', 'the_core_ajax_get_shortcode_custom_posts' );
add_action( 'wp_ajax_nopriv_the_core_ajax_get_shortcode_custom_posts', 'the_core_ajax_get_shortcode_custom_posts' );


if ( ! function_exists( 'the_core_ajax_get_shortcode_portfolio' ) ) :
	function the_core_ajax_get_shortcode_portfolio() {
		$type           = isset( $_POST['type'] ) ? $_POST['type'] : 'style1';
		$posts_per_page = isset( $_POST['posts_per_page'] ) ? $_POST['posts_per_page'] : 5;
		$category       = isset( $_POST['category'] ) ? $_POST['category'] : 0;
		$page           = isset( $_POST['page'] ) ? $_POST['page'] : 2;
		$extra          = isset( $_POST['extra'] ) ? ( $_POST['extra'] ) : '';
		$lang           = isset( $_POST['lang'] ) ? $_POST['lang'] : '';
		$loop_data      = ! empty( $extra ) ? unserialize( base64_decode( $extra ) ) : array();

		if ( function_exists( 'icl_object_id' ) && !empty($lang) ) {
			do_action( 'wpml_switch_language', $lang );
		}

		$tax_query = array();
		if ( $category != '0' ) {
			$tax_query = array(
				array(
					'taxonomy' => 'fw-portfolio-category',
					'field'    => 'term_id',
					'terms'    => $category
				)
			);
		}
		$args  = array(
			'posts_per_page' => $posts_per_page,
			'post_type'      => 'fw-portfolio',
			'post_status'    => 'publish',
			'paged'          => $page,
			'orderby'        => 'date',
			'suppress_filters' => false,
			'tax_query'      => $tax_query
		);
		$query = new WP_Query( $args );

		$html_posts = '';
		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) : $query->the_post();
				$html_posts .= the_core_render_view( fw_locate_theme_path( '/framework-customizations/extensions/portfolio/views/loop-' . $type . '.php' ), array( 'loop_data' => $loop_data ) );
			endwhile;
		endif;

		echo json_encode( array( 'html' => $html_posts ) );
		die();
	}
endif;
add_action( 'wp_ajax_the_core_ajax_get_shortcode_portfolio', 'the_core_ajax_get_shortcode_portfolio' );
add_action( 'wp_ajax_nopriv_the_core_ajax_get_shortcode_portfolio', 'the_core_ajax_get_shortcode_portfolio' );


