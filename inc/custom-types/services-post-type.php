<?php

if (!defined('ABSPATH')) {
	exit; // exit if accessed directly
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'init', 'register_services_post_types' );
function register_services_post_types() {
	register_post_type( 'services', [
		'label'  => null,
		'labels' => [
			'name'               => 'Услуги',
			'singular_name'      => 'Услуга',
			'add_new'            => 'Добавить услугу',
			'add_new_item'       => 'Добавление услуги',
			'edit_item'          => 'Редактировать услугу',
			'new_item'           => 'Еще услуга',
			'view_item'          => 'Смотреть услугу',
			'search_items'       => 'Искать услугу',
			'not_found'          => 'Не найдено',
			'not_found_in_trash' => 'Нет в корзине',
			'parent_item_colon'  => '',
			'menu_name'          => 'Услуги',
		],
		'description'            => '',
		'public'                 => true,
		'show_in_menu'           => null, // показывать ли в меню админки
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-star-filled',
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
		'taxonomies'          => [],
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}

function register_services_fields() {
    acf_add_local_field_group(array(
        'key' => 'group_news', // Уникальный ключ группы полей
        'title' => 'Событие', // Заголовок группы полей
        'fields' => array(
            array(
                'key' => 'news_icon',
                'label' => 'Иконка у заголовка',
                'name' => 'news_icon',
                'type' => 'image',
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

add_action('acf/init', 'register_services_fields');


add_action('pre_get_posts', 'customize_services_archive_query');
function customize_services_archive_query($query) {
    // Проверка, что мы находимся на странице архива news и это основной запрос
    if (is_post_type_archive('services') && $query->is_main_query()) {
        // Установка количества постов на странице в 30
        $query->set('posts_per_page', 30);
    }
}


add_action( 'wp_ajax_get_modal_services', 'get_modal_services' );
add_action( 'wp_ajax_nopriv_get_modal_services', 'get_modal_services' );
function get_modal_services() {

    global $post;
    $oldGlobal = $post;

    $id = $_POST['id'];
    $post = get_post( $id );

    $prev_post = get_previous_post();
    $next_post = get_next_post();
    $post = $oldGlobal;

    // Если пост первый, устанавливаем предыдущий пост как последний
    if (empty($prev_post)) {
        $prev_post = get_posts(array('numberposts' => 1, 'order' => 'DESC', 'post_type' => 'services'))[0];
    }

    // Если пост последний, устанавливаем следующий пост как первый
    if (empty($next_post)) {
        $next_post = get_posts(array('numberposts' => 1, 'order' => 'ASC', 'post_type' => 'services'))[0];
    }




    $single_news = array(
        'id' => $id,
        'thumb' => get_post_thumb($id),
        'title' => get_the_title($id),
        'content' => get_post_field('post_content', $id),
        'slug' => get_post_field('post_name', $id),
        'prev' => $prev_post->ID,
        'next' => $next_post->ID,
        'prev_url' => get_the_permalink($prev_post->ID),
        'next_url' => get_the_permalink($next_post->ID),
    );

    echo json_encode(array(
        'post' => $single_news,
    ));

    wp_die();
}
