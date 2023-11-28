<?php

add_action('acf/init', 'init_home_fields');
function init_home_fields() {
    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'group_home_settings',
            'title' => 'Настройки главной',
            'fields' => array(
                array(
                    'key' => 'field_home_news',
                    'label' => 'Новости на главной',
                    'name' => 'home_news',
                    'type' => 'relationship',
                    'post_type' => array('news'), // Adjust the post type as per your requirements
                    'filters' => array('search', 'post_type'), // Additional filters (optional)
                    'max' => 10, // Maximum number of selectable posts (optional)
                    'return_format' => 'object', // Return the post object (optional)
                ),
                array(
                    'key' => 'field_video_url',
                    'label' => 'Ссылка на видео на ютубе',
                    'name' => 'home_video_url',
                    'type' => 'text',
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
                        'value' => HOMEPAGE_ID, // Adjust the post type as per your requirements
                    ),
                ),
            ),
        ));

    endif;
}