<?php
if (!defined('ABSPATH')) {
	exit; // exit if accessed directly
}

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme settings',
        'menu_title' => 'Theme settings',
        'menu_slug' => 'theme-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_branding',
        'title' => 'Branding',
        'fields' => array(
            array(
                'key' => 'header_logo',
                'label' => 'Header logo',
                'name' => 'header_logo',
                'type' => 'image',
                'return_format' => 'id',
            ),
            array(
                'key' => 'hero_logo',
                'label' => 'Hero logo',
                'name' => 'hero_logo',
                'type' => 'image',
                'return_format' => 'id',
            ),
            array(
                'key' => 'default_og_img',
                'label' => 'Default socials image',
                'name' => 'default_og_img',
                'type' => 'image',
                'return_format' => 'id',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-settings',
                ),
            ),
        ),
    ));

    acf_add_local_field_group(array(
        'key' => 'group_contacts',
        'title' => 'Contacts',
        'fields' => array(
            array(
                'key' => 'field_book_url',
                'label' => 'Ссылка на бронь',
                'name' => 'book_url',
                'type' => 'text',
            ),
            array(
                'key' => 'field_phones',
                'label' => 'Phones',
                'name' => 'phones',
                'type' => 'textarea',
                'instructions' => 'Every phone must be on a new line',
            ),
            array(
                'key' => 'field_socials',
                'label' => 'Socials',
                'name' => 'socials',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_address',
                'label' => 'Address',
                'name' => 'address',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_coordinates',
                'label' => 'Coordinates',
                'name' => 'coordinates',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_iframe_url',
                'label' => 'Ссылка на айфрейм с картой',
                'name' => 'map_iframe_url',
                'type' => 'textarea',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-settings',
                ),
            ),
        ),
    ));
}
