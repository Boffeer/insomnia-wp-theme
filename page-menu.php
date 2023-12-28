<?php get_header(); ?>


<div class="screener screener--colored-primary">
    <section class="about screener__layout" id="about">
        <div class="screener__content screener__container">
            <div class="screener__header">
                <h1 class="screener__title"><?php the_title(); ?></h1>
            </div>
            <div class="screener__body">
                <div class="single-article single-article--reverse">
                    <?php $about_gallery = get_field('menu_gallery'); ?>
                    <?php if (!empty($about_gallery)) : ?>
                        <div class="single-article-carousel">
                            <div class="swiper single-article-carousel__swiper">
                                <div class="swiper-wrapper">
                                    <?php foreach ($about_gallery as $slide) : ?>
                                        <?php $slide = get_image_url_by_id($slide); ?>
                                        <div class="swiper-slide single-article-carousel__slide">
                                            <div class="single-article-carousel__media">
                                                <picture class="single-article-carousel__media-pic">
                                                    <img class="single-article-carousel__media-img"
                                                         src="<?php echo $slide; ?>"
                                                         alt=""
                                                    >
                                                </picture>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="b_swiper__buttons single-article-carousel__buttons">
                                <div class="swiper-button-prev single-article-carousel__button-prev"></div>
                                <div class="swiper-button-next single-article-carousel__button-next"></div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="single-article__body">
                        <?php $about_subtitle = get_field('menu_subtitle'); ?>
                        <?php if (!empty($about_subtitle)) : ?>
                            <h2 class="single-article__title single-article__title--big"><?php echo typograph($about_subtitle); ?></h2>
                        <?php endif; ?>
                        <div class="single-article__content wysiwyg">
                            <?php the_content(); ?>
                        </div>

                        <?php $menu_buttons = get_field('menu_buttons');?>
                        <?php if (!empty($menu_buttons)) : ?>
                        <div class="single-article__buttons">
                            <?php foreach ($menu_buttons as $button) : ?>
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
                                    <span class="single-article__button-wrap">
                                        <img class="single-article__button-icon" src="<?php echo $button_icon; ?>" alt="<?php echo $button['text']; ?>">
                                    </span>
                                    <span class="single-article__button-text"><?php echo $button['text']; ?></span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="screener__bg container">
            <div class="screener__particles-upper">
            </div>
            <div class="screener__particles-bottom">
                <div class="blob js_use-bg" data-use-bg="<?php echo THEME_STATIC; ?>/img/about.insm/blob-1.svg"></div>
                <div class="blob js_use-bg" data-use-bg="<?php echo THEME_STATIC; ?>/img/about.insm/blob-2.svg"></div>
            </div>
        </div>
    </section>
</div>



<?php get_footer(); ?>
