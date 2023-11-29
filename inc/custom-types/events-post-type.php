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
		'supports'            => [ 'title', 'editor', 'excerpt' ],
		'taxonomies'          => [],
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}

function register_events_fields() {
    acf_add_local_field_group(array(
        'key' => 'group_events_gallery', // Уникальный ключ группы полей
        'title' => 'Ивент', // Заголовок группы полей
        'fields' => array(
            array(
                'key' => 'events_subtitle',
                'label' => 'Подзаголовок',
                'name' => 'events_subtitle',
                'type' => 'textarea',
            ),
            array(
                'key' => 'events_gallery', // Уникальный ключ поля
                'label' => 'Галерея', // Заголовок поля
                'name' => 'events_gallery', // Имя поля
                'type' => 'gallery', // Тип поля галереи
                'return_format' => 'id',
            ),
            array(
                'key' => 'events_icon',
                'label' => 'Иконка у заголовка',
                'name' => 'events_icon',
                'type' => 'image',
                'return_format' => 'id',
            ),
            array(
                'key' => 'events_buttons',
                'label' => 'Кнопки',
                'name' => 'events_buttons',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_file',
                        'label' => 'Файл для загрузки',
                        'name' => 'file',
                        'type' => 'file',
                    ),
                    array(
                        'key' => 'field_url',
                        'label' => 'Ссылка',
                        'name' => 'url',
                        'type' => 'text',
                        'instructions' => 'Если заполнено, то кнпока будет не скачивать, а открывать ссылку',
                    ),
                    array(
                        'key' => 'field_text',
                        'label' => 'Текст ссылки',
                        'name' => 'text',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_icon',
                        'label' => 'Иконка',
                        'name' => 'icon',
                        'type' => 'image',
                        'return_format' => 'id',
                        'instructions' => 'Необязательно, если в тексте в Текст ссылки написано Bar или Menu',
                    ),
                ),
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

