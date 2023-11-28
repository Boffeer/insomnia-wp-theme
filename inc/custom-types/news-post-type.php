<?php

if (!defined('ABSPATH')) {
	exit; // exit if accessed directly
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'init', 'register_news_post_types' );
function register_news_post_types() {
	register_post_type( 'news', [
		'label'  => null,
		'labels' => [
			'name'               => 'События',
			'singular_name'      => 'События',
			'add_new'            => 'Добавить событие',
			'add_new_item'       => 'Добавление события',
			'edit_item'          => 'Редактировать событие',
			'new_item'           => 'Еще событие',
			'view_item'          => 'Смотреть событие',
			'search_items'       => 'Искать событие',
			'not_found'          => 'Не найдено',
			'not_found_in_trash' => 'Нет в корзине',
			'parent_item_colon'  => '',
			'menu_name'          => 'События',
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

function register_news_fields() {
    acf_add_local_field_group(array(
        'key' => 'group_gallery', // Уникальный ключ группы полей
        'title' => 'Галерея', // Заголовок группы полей
        'fields' => array(
            array(
                'key' => 'gallery_field', // Уникальный ключ поля
                'label' => 'Галерея', // Заголовок поля
                'name' => 'gallery', // Имя поля
                'type' => 'gallery', // Тип поля галереи
                'return_format' => 'id',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'news', // Значение типа записей
                ),
            ),
        ),
    ));
}

add_action('acf/init', 'register_news_fields');

