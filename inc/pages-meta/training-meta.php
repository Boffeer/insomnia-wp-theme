<?php


add_action('acf/init', 'init_training_fields');
function init_training_fields() {

    $TRAINING_PAGE_ID = '25';
    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'group_training_settings',
            'title' => 'Настройки training',
            'fields' => array(
                array(
                    'key' => 'field_training_gallery', // Уникальный ключ поля
                    'label' => 'Галерея', // Заголовок поля
                    'name' => 'training_gallery', // Имя поля
                    'type' => 'gallery', // Тип поля галереи
                    'return_format' => 'id',
                ),
                array(
                    'key' => 'field_training_subtitle',
                    'label' => 'Подзаголовок',
                    'name' => 'training_subtitle',
                    'type' => 'textarea',
                ),
                /*
                array(
                    'key' => 'field_training_buttons_urls',
                    'label' => 'Кнопки под текстом',
                    'name' => 'training_buttons_urls',
                    'type' => 'textarea',
                    'instructions' => 'Между кнопки отделять пустой строкой. Первая строка ссылка, вторая строка текст, третья строка кастомная иконка <br> Если написать у ссылки ||link, то не будет скачиваться',
                ),
                */
                array(
                    'key' => 'training_buttons',
                    'label' => 'Кнопки',
                    'name' => 'training_buttons',
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
                        'value' => $TRAINING_PAGE_ID, // Adjust the post type as per your requirements
                    ),
                ),
            ),
        ));

    endif;
}