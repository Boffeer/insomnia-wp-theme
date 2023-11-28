<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sklh
 */

get_header();
?>


<?php
//$socials = get_socials(THEME_OPTIONS['socials']);
//$phones = explode_textarea(THEME_OPTIONS['phones']);
?>



    <div class="screener">
        <section class="screener__layout page-home" id="home">
            <div class="hero screener__content container">
                <div class="hero__card">
                    <div class="hero__card-bg js_use-bg" data-use-bg="<?php echo THEME_STATIC; ?>/img/common.insm/board.svg"></div>
                    <div class="hero__card-logo">
                        <picture class="hero__card-logo-pic">
                            <img class="hero__card-logo-img" src="<?php echo THEME_STATIC; ?>/img/common.insm/full-logo.svg" alt="">
                        </picture>
                    </div>
                </div>
                <a href="#" class="hero__button blob-button">
                <span class="blob-button__play">
                  <span class="blob-button__text"></span>
                </span>
                    <span class="blob-button__bg"></span>
                </a>
                <?php
                    $news = get_field('field_home_news');
                ?>
                <ul class="hero__bullet-list">
                    <?php foreach ($news as $article) : ?>
                        <li class="hero__bullet">
                            <a href="<?php echo the_permalink($article->ID)?>" class="hero__bullet-link"><?php echo $article->post_title; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="screener__bg">
            </div>
            <div class="screener__particles-upper">
                <div class="blob js_use-bg" data-use-bg="<?php echo THEME_STATIC; ?>/img/hero.insm/blob-2.svg"></div>
                <div class="blob js_use-bg" data-use-bg="<?php echo THEME_STATIC; ?>/img/hero.insm/blob-3.svg"></div>
            </div>
            <div class="screener__particles-bottom">
                <div class="blob js_use-bg" data-use-bg="<?php echo THEME_STATIC; ?>/img/hero.insm/blob-1.svg"></div>
            </div>
        </section>
    </div>



<?php
get_footer();
