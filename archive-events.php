<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sklh
 */

get_header();
?>


    <div class="screener screener--colored-primary">
        <section class="news screener__layout" id="news">
            <div class="screener__content screener__container">
                <div class="screener__header">
                    <h1 class="screener__title">Ивенты</h1>
                </div>
                <div class="screener__body">
                    <div class="events__gallery">
                        <?php if ( have_posts() ) : ?>
                            <?php while ( have_posts() ) : ?>
                                <?php the_post(); ?>
                                <?php get_template_part( 'template-parts/content', 'news' ); ?>

                            <?php endwhile; ?>

                            <?php the_posts_navigation(); ?>

                        <?php else : ?>

                            <?php get_template_part( 'template-parts/content', 'none' ); ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="screener__bg container">
                <div class="screener__particles-upper">
                </div>
                <div class="screener__particles-bottom">
                    <div class="blob js_use-bg" data-use-bg="<?php echo THEME_STATIC; ?>/img/news.insm/blob-1.svg"></div>
                    <div class="blob js_use-bg" data-use-bg="<?php echo THEME_STATIC; ?>/img/news.insm/blob-2.svg"></div>
                </div>
            </div>
        </section>
    </div>





<?php
get_footer();
