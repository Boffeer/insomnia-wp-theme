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

<?php
    $args = array(
        'post_type' => 'services',    // Указываем тип записей, который нам нужен
        'posts_per_page' => -1,   // -1 для вывода всех записей, можно установить другое значение
    );
    $news_query = new WP_Query($args);

    $posts_count = $news_query->post_count;
    $current_post_index = 0;
    $posts_per_page = 6;

?>

    <div class="screener screener--colored-primary">
        <section class="news screener__layout" id="services">
            <div class="screener__content screener__container">
                <div class="screener__header">
                    <h1 class="screener__title">Услуги</h1>
                </div>
                <div class="screener__body">
                    <div class="accordion-carousel">
                        <div class="swiper accordion-carousel__swiper">
                            <div class="swiper-wrapper">
                                <?php if ( $news_query->have_posts() ) : ?>
                                    <?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
                                        <?php if ($current_post_index % $posts_per_page === 0) : ?>
                                            <div class="swiper-slide accordion-carousel__slide">
                                        <?php endif; ?>

                                        <?php get_template_part( 'template-parts/content', 'news' ); ?>

                                        <?php if (($current_post_index + 1) % $posts_per_page == 0 || $current_post_index == $posts_count - 1) : ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php $current_post_index++; ?>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="accordion-carousel__pagination swiper-pagination"></div>
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
