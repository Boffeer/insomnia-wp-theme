<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package crrt
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php wp_head(); ?>
    <?php echo m_get_header_meta(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="wrapper" data-barba="wrapper">

    <header class="header">
        <div class="container header__container">
            <?php $header_logo = THEME_OPTIONS['header_logo'];
            if (empty($header_logo)) {
                $header_logo = THEME_STATIC . '/img/common.insm/logo.svg';
            } else {
                $header_logo = get_image_url_by_id($header_logo);
            }
            ?>
            <a href="/" class="header__logo logo">
                <img src="<?php echo $header_logo; ?>" alt="" class="logo__img">
            </a>

            <div class="header__menu menu">
                <nav class="menu__nav container">
                    <?php $menu = get_menu_location('nav-burger'); ?>
                    <ul class="menu__nav-links">
                        <?php foreach ($menu as $menu_item) : ?>
                            <li class="menu__nav-item">
                                <a href="<?php echo $menu_item['href']; ?>" class="menu__nav-link">
                                    <?php echo $menu_item['title']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </div>

            <button class="burger header__burger">
                <span class="burger__line"></span>
                <span class="burger__line"></span>
                <span class="burger__line"></span>
            </button>

            <?php $book_url = THEME_OPTIONS['book_url']; ?>
            <?php if (!empty($book_url)) : ?>
            <a href="<?php echo $book_url; ?>"
                  class="header-button__book round-button"
                  target="_blank"
                  rel="noopener noreferrer"
                  aria-label="Забронировть сейчас"
            >
                  <svg class="round-button__text" viewbox="0 0 100 100">
                      <path  d="M 10,50
                      a 30,30 0 1,1 80,0
                      a 30,30 0 1,1 -80,0"
                      id="curve"/>
                      <text x="1" fill="currentColor">
                          <textpath xlink:href="#curve" spacing="exact">
                              Забронировать &nbsp; сейчас
                          </textpath>
                      </text>
                  </svg>
                  <svg class="round-button__icon">
                      <use href="<?php echo THEME_STATIC; ?>/img/common.insm/lock.svg#lock"></use>
                  </svg>
            </a>
            <?php endif; ?>
        </div>
    </header>

    <?php $barba_animation = 'clip'; ?>
    <?php if (is_single()) : if (get_post_type(get_the_ID()) === 'news') : ?>
        <?php $barba_animation = 'news'; ?>
    <?php endif; ?> <?php endif; ?>

    <main class="main" data-barba="container" data-barba-namespace="<?php echo $barba_animation; ?>">
