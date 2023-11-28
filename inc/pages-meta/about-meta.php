<?php

define('ABOUT_PAGE_ID', "19");

add_action('acf/init', 'init_about_fields');
function init_about_fields() {

    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'group_about_settings',
            'title' => 'Настройки about',
            'fields' => array(
                array(
                    'key' => 'field_about_gallery', // Уникальный ключ поля
                    'label' => 'Галерея', // Заголовок поля
                    'name' => 'about_gallery', // Имя поля
                    'type' => 'gallery', // Тип поля галереи
                    'return_format' => 'id',
                ),
                array(
                    'key' => 'field_about_subtitle',
                    'label' => 'Подзаголовок',
                    'name' => 'about_subtitle',
                    'type' => 'textarea',
                ),
                /*
                array(
                    'key' => 'field_about_buttons_urls',
                    'label' => 'Кнопки под текстом',
                    'name' => 'about_buttons_urls',
                    'type' => 'textarea',
                    'instructions' => 'Между кнопки отделять пустой строкой. Первая строка ссылка, вторая строка текст, третья строка кастомная иконка <br> Если написать у ссылки ||link, то не будет скачиваться',
                ),
                */
                array(
                    'key' => 'about_buttons',
                    'label' => 'Кнопки',
                    'name' => 'about_buttons',
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
                        'value' => ABOUT_PAGE_ID, // Adjust the post type as per your requirements
                    ),
                ),
            ),
        ));

    endif;
}