<?php

if (!defined('ABSPATH')) {
	exit; // exit if accessed directly
}

add_action( 'init', 'register_events_post_types' );
function register_events_post_types() {
	register_post_type( 'events', [
		'label'  => null,
		'labels' => [
			'name'               => 'Ивенты',
			'singular_name'      => 'Ивент',
			'add_new'            => 'Добавить ивент',
			'add_new_item'       => 'Добавление ивента',
			'edit_item'          => 'Редактировать ивент',
			'new_item'           => 'Еще ивент',
			'view_item'          => 'Смотреть ивент',
			'search_items'       => 'Искать ивент',
			'not_found'          => 'Не найдено',
			'not_found_in_trash' => 'Нет в корзине',
			'parent_item_colon'  => '',
			'menu_name'          => 'Ивенты',
		],
		'description'            => '',
		'public'                 => true,
		'show_in_menu'           => null, // показывать ли в меню админки
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-star-filled',
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor' ],
		'taxonomies'          => [],
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}

function register_events_fields() {
    acf_add_local_field_group(array(
        'key' => 'group_gallery', // Уникальный ключ группы полей
        'title' => 'Галерея', // Заголовок группы полей
        'fields' => array(
            array(
                'key' => 'gallery_field', // Уникальный ключ поля
                'label' => 'Галерея', // Заголовок поля
                'name' => 'gallery', // Имя поля
                'type' => 'gallery', // Тип поля галереи
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'events', // Значение типа записей
                ),
            ),
        ),
    ));
}

add_action('acf/init', 'register_events_fields');

