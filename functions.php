<?php
/**
 * bh functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bh
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bh_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on bh, use a find and replace
		* to change 'bh' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'bh', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'nav-burger' => esc_html__( 'Меню в бургере', 'bh' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'bh_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bh_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bh_content_width', 640 );
}
add_action( 'after_setup_theme', 'bh_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function bh_scripts() {
	wp_enqueue_style( 'bh-style', get_template_directory_uri() . '/static/dist/css/style.css', array(), _S_VERSION );

	wp_enqueue_script( 'bh-scripts', get_template_directory_uri() . '/static/dist/js/index.min.js', array(), _S_VERSION, true );

    $data = array(
        'url' => admin_url( 'admin-ajax.php' ),
        'static' => get_template_directory_uri() . '/static/dist',
    );
    wp_add_inline_script( 'bh-scripts', 'window.m_ajax = ' . wp_json_encode( $data ), 'before' );
}
add_action( 'wp_enqueue_scripts', 'bh_scripts' );

/**
 * Customizer additions.
 */
require get_stylesheet_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/merlin/defines.php';

require get_template_directory() . '/inc/merlin/merlin-functions.php';

/*
	Post types
 */
//require THEME_INC . '/custom-types/cars-post-type.php';
//require THEME_INC . '/custom-types/reviews-post-type.php';
require THEME_INC . '/custom-types/news-post-type.php';
require THEME_INC . '/custom-types/events-post-type.php';
require THEME_INC . '/custom-types/services-post-type.php';

/*
	Pages meta
 */
require THEME_INC . '/pages-meta/homepage-meta.php';
require THEME_INC . '/pages-meta/about-meta.php';
require THEME_INC . '/pages-meta/menu-meta.php';
require THEME_INC . '/pages-meta/training-meta.php';
require THEME_INC . '/pages-meta/prices-meta.php';
require THEME_INC . '/pages-meta/any-post-meta.php';


require THEME_INC . '/insm/functions.php';

/*
function reviews_posts_navigation() {
    $prev_link = get_previous_posts_link( 'Свежие отзывы' );
    $next_link = get_next_posts_link( 'Ранние отзывы' );

    $arrow_left = '<svg class="button__icon button__icon-left"> <use href="' . THEME_STATIC . '/img/bh_common/arrow-left.svg#arrow-left"/> </svg>';
    $arrow_right = '<svg class="button__icon button__icon-right"> <use href="' . THEME_STATIC . '/img/bh_common/arrow-right.svg#arrow-right"/> </svg>';


    if ( $prev_link || $next_link ) {
        echo '<nav class="container section-buttons content-reviews__buttons">';
        if ( $prev_link ) {
            echo '<div class="nav-previous button-primary">' . $arrow_left . $prev_link . '</div>';
        }
        if ( $next_link ) {
            echo '<div class="nav-next button-secondary">' . $next_link . $arrow_right . '</div>';
        }
        echo '</nav>';
    }
}
*/