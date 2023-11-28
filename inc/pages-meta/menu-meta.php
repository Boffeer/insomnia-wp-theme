<?php

define('MENU_PAGE_ID', "23");

add_action('acf/init', 'init_menu_fields');
function init_menu_fields() {

    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'group_menu_settings',
            'title' => 'Настройки menu',
            'fields' => array(
                array(
                    'key' => 'field_menu_gallery', // Уникальный ключ поля
                    'label' => 'Галерея', // Заголовок поля
                    'name' => 'menu_gallery', // Имя поля
                    'type' => 'gallery', // Тип поля галереи
                    'return_format' => 'id',
                ),
                array(
                    'key' => 'field_menu_subtitle',
                    'label' => 'Подзаголовок',
                    'name' => 'menu_subtitle',
                    'type' => 'textarea',
                ),
                array(
                    'key' => 'menu_buttons',
                    'label' => 'Кнопки',
                    'name' => 'menu_buttons',
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
                        'value' => 'page', // Adjust the post type as per your requirements
                    ),
                    array(
                        'param' => 'page',
                        'operator' => '==',
                        'value' => MENU_PAGE_ID, // Adjust the post type as per your requirements
                    ),
                ),
            ),
        ));

    endif;
}