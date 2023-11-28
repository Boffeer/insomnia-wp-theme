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

/*
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'register_homepage_fields');
function register_homepage_fields() {

	$homepage_id  = get_option('page_on_front');

	Container::make('post_meta', 'homepage_info', 'Homepage')
		->where('post_id', '=', $homepage_id)
		->add_tab('Hero section', array(
            Field::make('textarea', 'hero_title', 'Title'),
            Field::make('complex', 'banners', 'Carousel banners')
                ->add_fields(array(
                    Field::make('textarea', 'text', 'Banner text'),
                    Field::make('text', 'link_text', 'Banner link text')
                        ->set_width(50),
                    Field::make('text', 'link_url', 'Banner link url')
                        ->set_width(50),
                    Field::make( 'image', 'img', __( 'Banner image' ) )
                ) ),
            Field::make('textarea', 'location_start_names', 'Locations start')
                ->set_help_text('One line - one location')
                ->set_width(50),
            Field::make('textarea', 'location_end_names', 'Locations end')
                ->set_help_text('One line - one location')
                ->set_width(50),
            Field::make('complex', 'bullets', 'Bullets')
                ->add_fields(array(
                    Field::make( 'image', 'icon', __( 'Bullet icon' ) ),
                    Field::make('textarea', 'title', 'Bullet title'),
                    Field::make('textarea', 'text', 'Bullet text'),
                ) ),
        ))
        ->add_tab('Cars', array(
            Field::make('association', 'home_cars', 'Default cars')
                ->set_types( array(
                    array(
                        'type' => 'post',
                        'post_type' => 'cars',
                    ),
                ) )
        ))
        ->add_tab('Reviews', array(
            Field::make( 'association', 'home_reviews', __( 'Reviews' ) )
                ->set_types( array(
                    array(
                        'type'      => 'post',
                        'post_type' => 'reviews',
                    )
                ) ),
            ))
        ->add_tab('FAQ', array(
            Field::make( 'association', 'home_faq', __( 'FAQ cards' ) )
                ->set_types( array(
                    array(
                        'type'      => 'post',
                        'post_type' => 'faq',
                    )
                ) ),
            Field::make( 'image', 'faq_img', __( 'FAQ image' ) ),
            Field::make('textarea', 'faq_title', 'FAQ title'),
            Field::make('textarea', 'faq_text', 'FAQ text'),
        ))
        ->add_tab('Meta', array(
            Field::make('textarea', 'price_tariffs', 'Tariff names'),
        ))
    ;
}

*/