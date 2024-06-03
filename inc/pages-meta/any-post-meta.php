<?php

add_action('acf/init', 'init_anypost_fields');
function init_anypost_fields() {
    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'group_seo_settings',
            'title' => 'SEO',
            'fields' => array(
                array(
                    'key' => 'field_seo_title',
                    'label' => 'SEO title',
                    'name' => 'seo_title',
                    'type' => 'textarea',
                ),
                array(
                    'key' => 'field_seo_description',
                    'label' => 'SEO description',
                    'name' => 'seo_description',
                    'type' => 'textarea',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'news',
                    ),
                ),
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'events',
                    ),
                ),
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'page',
                    ),
                ),
            ),
        ));

    endif;
}