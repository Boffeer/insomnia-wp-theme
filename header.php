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

<div class="wrapper">

    <?php
        $socials = get_socials(THEME_OPTIONS['socials']);
//        $phones = explode_textarea(THEME_OPTIONS['phones']);
//        $email = THEME_OPTIONS['emails'];
        $logo = THEME_OPTIONS['logo'];
    ?>

    <header class="header">
        <div class="container header__container">
            <a href="#" class="header__logo logo">
                <img src="./img/common.insm/logo.svg" alt="" class="logo__img">
            </a>

            <div class="header__menu menu">
                <nav class="menu__nav container">
                    <ul class="menu__nav-links">
                        <li class="menu__nav-item menu__nav-item--active">
                            <a href="#" class="menu__nav-link">О парке</a>
                        </li>
                        <li class="menu__nav-item">
                            <a href="#" class="menu__nav-link">Цены</a>
                        </li>
                        <li class="menu__nav-item">
                            <a href="#" class="menu__nav-link">Ивенты</a>
                        </li>
                        <li class="menu__nav-item">
                            <a href="#" class="menu__nav-link">Меню</a>
                        </li>
                        <li class="menu__nav-item">
                            <a href="#" class="menu__nav-link">События</a>
                        </li>
                        <li class="menu__nav-item">
                            <a href="#" class="menu__nav-link">Тренинг</a>
                        </li>
                        <li class="menu__nav-item">
                            <a href="#" class="menu__nav-link">Карта</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <button class="burger header__burger">
                <span class="burger__line"></span>
                <span class="burger__line"></span>
                <span class="burger__line"></span>
            </button>

            <a href="#" class="header-button__book round-button" aria-label="Забронировть сейчас">
                <!-- https://codepen.io/ponycorn/pen/MWbgXgE -->
                <svg class="round-button__text" viewbox="0 0 100 100">
                    <path  d="M 10,50
                  a 30,30 0 1,1 80,0
                  a 30,30 0 1,1 -80,0"
                           id="curve"/>
                    <text x="1" fill="currentColor">
                        <textpath xlink:href="#curve" spacing="exact">
                            Забронировать &nbsp; сейчас
                            <!-- &nbsp;Забронировать&nbsp; &nbsp; сейчас -->
                        </textpath>
                    </text>
                </svg>
                <svg class="round-button__icon">
                    <use href="./img/common.insm/lock.svg#lock"></use>
                </svg>
            </a>
        </div>
    </header>

    <main class="main">
