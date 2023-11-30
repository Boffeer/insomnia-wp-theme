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
                    'key' => 'field_training_subtitle',
                    'label' => 'Подзаголовок',
                    'name' => 'training_subtitle',
                    'type' => 'textarea',
                ),
                array(
                    'key' => 'training_mentors',
                    'label' => 'Тренеры',
                    'name' => 'training_mentors',
                    'type' => 'repeater',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_photo',
                            'label' => 'Фото',
                            'name' => 'photo',
                            'type' => 'image',
                            'return_format' => 'id',
                        ),
                        array(
                            'key' => 'field_name',
                            'label' => 'Имя',
                            'name' => 'name',
                            'type' => 'textarea',
                        ),
                        array(
                            'key' => 'field_excerpt',
                            'label' => 'Краткое описание',
                            'name' => 'excerpt',
                            'type' => 'textarea',
                        ),
                        array(
                            'key' => 'field_content',
                            'label' => 'Описание',
                            'name' => 'content',
                            'type' => 'wysiwyg',
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