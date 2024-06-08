<?php get_header(); ?>

<?php
$event = array(
    'subtitle' => get_field('events_subtitle'),
    'gallery' => get_field('events_gallery'),
    'icon' => get_field('events_icon'),
    'excerpt' => get_the_excerpt(),
    'buttons' => get_field('events_buttons'),
);

if (empty($event['excerpt'])) {
    $event['excerpt'] = $event['subtitle'];
}

if (!empty($event['icon'])) {
    $event['icon'] = get_image_url_by_id($event['icon']);
}

?>

<div class="screener screener--colored-primary">
    <section class="news screener__layout" id="news">
        <div class="screener__content screener__container">
            <div class="screener__header">
                <h1 class="screener__title"><?php the_title(); ?></h1>
            </div>
            <div class="screener__body">
                <div class="single-article">
                    <div class="single-article-carousel">
                        <div class="swiper single-article-carousel__swiper">
                            <div class="swiper-wrapper">
                                <?php foreach ($event['gallery'] as $slide) : ?>
                                <a class="swiper-slide single-article-carousel__slide"
                                   href="<?php echo get_image_url_by_id($slide); ?>"
                                   data-fancybox="gallery"
                                   data-barba-prevent="self"
                                   target="_blank"
                                >

                                    <div class="single-article-carousel__media">
                                        <picture class="single-article-carousel__media-pic">
                                            <img class="single-article-carousel__media-img"
                                                 src="<?php echo get_image_url_by_id($slide); ?>" alt="<?php the_title(); ?>">
                                        </picture>
                                    </div>
                                </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="b_swiper__buttons single-article-carousel__buttons">
                            <div class="swiper-button-prev single-article-carousel__button-prev"></div>
                            <div class="swiper-button-next single-article-carousel__button-next"></div>
                        </div>
                    </div>
                    <div class="single-article__body">
                        <h2 class="single-article__title"><?php echo typograph($event['subtitle']); ?></h2>
                        <div class="single-article__content wysiwyg">
                            <?php the_content(); ?>
                        </div>
                        <?php echo get_single_buttons($event['buttons']) ?>
                        <?php /*
                        <?php if (!empty($event['buttons'])) : ?>
                            <div class="single-article__buttons">
                                <?php foreach ($event['buttons'] as $button) : ?>
                                    <?php
                                    $button_icon = '';
                                    if (strtolower($button['text']) === "bar") {
                                        $button_icon = THEME_STATIC . '/img/single-event.insm/bar.svg';
                                    } else if (strtolower($button['text']) === "menu") {
                                        $button_icon = THEME_STATIC . '/img/single-event.insm/food.svg';
                                    } else if ($button['icon']) {
                                        $button_icon = get_image_url_by_id($button['icon']);
                                    }

                                    $button_link = '';
                                    if ($button['file']) {
                                        $button_link = $button['file']['url'];
                                    } else if ($button['url']) {
                                        $button_link = $button['url'];
                                    }

                                    ?>
                                    <a href="<?php echo $button_link;?>" <?php echo $button['file'] ? 'download' : ''; ?> class="single-article__button">
                                        <img class="single-article__button-icon" src="<?php echo $button_icon; ?>" alt="<?php echo $button['text']; ?>">
                                        <span class="single-article__button-text"><?php echo $button['text']; ?></span>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
 */ ?>
                    </div>
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




<?php get_footer(); ?>
