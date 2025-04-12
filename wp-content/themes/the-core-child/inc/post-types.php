<?php

add_action('init', 'register_post_types');

function register_post_types()
{
//убрать на рабочем сайте - это для тестового
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
//

	register_post_type('clubs', [
		'label'  => null,
		'labels' => [
			'name'               => 'Клубы', // основное название для типа записи
			'singular_name'      => 'Клуб', // название для одной записи этого типа
			'add_new'            => 'Добавить Клуб', // для добавления новой записи
			'add_new_item'       => 'Добавление Клуба', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование Клуба', // для редактирования типа записи
			'new_item'           => 'Новый Клуб', // текст новой записи
			'view_item'          => 'Смотреть клуб', // для просмотра записи этого типа.
			'search_items'       => 'Искать клуб', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Клубы', // название меню
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'           => true, // показывать ли в меню админки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-cart',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => true,
		'supports'            => ['title', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => ['locate'],
		'has_archive'         => true,
		'rewrite'             => array(
			'slug'	=> 'clubs',
		),
		'query_var'           => 'clubs',
	]);

}

// регистрация таксономии для clubs - locate

function register_locate_taxonomy() {
    $labels = array(
        'name'              => 'Локации',
        'singular_name'     => 'Локация',
        'search_items'      => 'Поиск локаций',
        'all_items'         => 'Все локации',
        'parent_item'       => 'Родительская локация',
        'parent_item_colon' => 'Родительская локация:',
        'edit_item'         => 'Редактировать локацию',
        'update_item'       => 'Обновить локацию',
        'add_new_item'      => 'Добавить новую локацию',
        'new_item_name'     => 'Название новой локации',
        'menu_name'         => 'Локации',
    );

    $args = array(
        'hierarchical'      => true, // true — как категории, false — как теги
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'locate'),
    );

    register_taxonomy('locate', array('clubs'), $args);
}
add_action('init', 'register_locate_taxonomy');