
<?php 
add_action( 'init', 'register_post_types' );
function register_post_types(){
	register_post_type( 'fw-event', [
		'label'  => '',
		'labels' => [
			'name'               => 'События',
			'singular_name'      => 'событие', 
			'add_new'            => 'Добавить событие', 
			'add_new_item'       => 'Добавить событие', 
			'edit_item'          => 'Редактирование событиеа', 
			'new_item'           => 'событие',

			'view_item'          => 'Смотреть событие', 
			'search_items'       => 'Искать событие', 
			'not_found'          => 'Не найдено', 

			'not_found_in_trash' => 'Не найдено в корзине', 
			'parent_item_colon'  => '', 
			'menu_name'          => 'События', 
		],

		'description'            => '',

		'public'                 => true,

		'show_in_menu'           => null,

		'show_in_rest'        => true, 

		'rest_base'           => null, 

		'menu_position'       => null,

		'menu_icon'           => 'dashicons-format-video',

		'hierarchical'        => false,

		'supports'            => [ 'title', 'editor', 'thumbnail' ], 
		'taxonomies'          => ['category'],

		'has_archive'         => true,

		'rewrite'             => true,

		'query_var'           => true,

	] );



}