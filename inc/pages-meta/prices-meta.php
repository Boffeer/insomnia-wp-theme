<?php


add_action('acf/init', 'init_prices_fields');
function init_prices_fields() {

    $PRICES_PAGE_ID = '17';
    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'group_prices_settings',
            'title' => 'Настройки prices',
            'fields' => array(
                array(
                    'key' => 'prices_wakeboard',
                    'label' => 'Вейкборд',
                    'name' => 'prices_wakeboard',
                    'type' => 'repeater',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_prices_wake_table',
                            'label' => 'Таблица',
                            'name' => 'prices_wake_table',
                            'type' => 'textarea',
                        ),
                    ),
                ),
                array(
                    'key' => 'prices_rent',
                    'label' => 'Прокат',
                    'name' => 'prices_rent',
                    'type' => 'repeater',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_prices_rent_table',
                            'label' => 'Таблица',
                            'name' => 'prices_rent_table',
                            'type' => 'textarea',
                        ),
                    ),
                ),
                array(
                    'key' => 'prices_courses',
                    'label' => 'Курсы',
                    'name' => 'prices_courses',
                    'type' => 'repeater',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_prices_courses_title',
                            'label' => 'Название курса',
                            'name' => 'prices_courses_title',
                            'type' => 'textarea',
                        ),
                        array(
                            'key' => 'field_prices_courses_desc',
                            'label' => 'Описание курса',
                            'name' => 'prices_courses_desc',
                            'type' => 'textarea',
                        ),
                        array(
                            'key' => 'field_prices_courses_cost',
                            'label' => 'Цена в будние',
                            'name' => 'prices_courses_cost',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_prices_courses_cost_weekend',
                            'label' => 'Цена в выходные',
                            'name' => 'prices_courses_cost_weekend',
                            'type' => 'text',
                        ),
                    ),
                ),
                array(
                    'key' => 'field_prices_season_pass_title',
                    'label' => 'Заголовок Season Pass',
                    'name' => 'prices_season_pass_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_prices_season_pass_img',
                    'label' => 'Картинка Season Pass',
                    'name' => 'field_prices_season_pass_img',
                    'type' => 'image',
                    'return_format' => 'id',
                ),
                array(
                    'key' => 'field_prices_season_pass',
                    'label' => 'Season Pass',
                    'name' => 'prices_season_pass',
                    'type' => 'repeater',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_prices_season_pass_title',
                            'label' => 'Заголовок',
                            'name' => 'prices_season_pass_title',
                            'type' => 'textarea',
                        ),
                        array(
                            'key' => 'field_prices_season_pass_desc',
                            'label' => 'Описание',
                            'name' => 'prices_season_pass_desc',
                            'type' => 'textarea',
                        ),
                        array(
                            'key' => 'field_prices_season_pass_price',
                            'label' => 'Цена',
                            'name' => 'prices_season_pass_price',
                            'type' => 'text',
                        ),
                    )
                )


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
                        'value' => $PRICES_PAGE_ID, // Adjust the post type as per your requirements
                    ),
                ),
            ),
        ));

    endif;
}