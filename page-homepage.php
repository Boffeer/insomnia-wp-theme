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


    <div class="screener">
        <section class="screener__layout page-home" id="home">
            <div class="hero screener__content container">
                <div class="hero__card">
                    <div class="hero__card-bg js_use-bg" data-use-bg="<?php echo THEME_STATIC; ?>/img/common.insm/board.svg"></div>
                    <div class="hero__card-logo">
                        <?php $hero_logo = THEME_OPTIONS['hero_logo']; ?>
                        <?php
                            if (empty($hero_logo)) {
                                $hero_logo = THEME_STATIC . '/img/common.insm/full-logo.svg';
                            } else {
                                $hero_logo = get_image_url_by_id($hero_logo);
                            }
                        ?>
                        <picture class="hero__card-logo-pic">
                            <img class="hero__card-logo-img" src="<?php echo $hero_logo; ?>" alt="">
                        </picture>
                    </div>
                </div>

                <?php $home_video_url = get_field('home_video_url'); ?>
                <?php if (!empty($home_video_url)) : ?>
                    <a href="<?php echo $home_video_url; ?>" class="hero__button blob-button" data-fancybox>
                    <span class="blob-button__play">
                      <span class="blob-button__text"></span>
                    </span>
                        <span class="blob-button__bg"></span>
                    </a>
                <?php endif; ?>
                <?php
                    $news = get_field('field_home_news');
                ?>
                <ul class="hero__bullet-list">
                    <?php foreach ($news as $article) : ?>
                        <li class="hero__bullet">
                            <a href="<?php echo the_permalink($article->ID)?>"
                               class="hero__bullet-link"
                               data-id="<?php echo $article->ID; ?>"
                            >
                                <?php echo $article->post_title; ?>
                            </a>
                            <?php /*<a href="<?php echo the_permalink($article->ID)?>" class="hero__bullet-link"><?php echo $article->post_title; ?></a> */ ?>
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
