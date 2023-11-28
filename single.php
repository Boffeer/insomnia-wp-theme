<?php get_header(); ?>

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

                                <div class="swiper-slide single-article-carousel__slide">
                                    <div class="single-article-carousel__media">
                                        <picture class="single-article-carousel__media-pic">
                                            <img class="single-article-carousel__media-img" src="./img/events.insm/single-events-hero.jpg" alt="">
                                        </picture>
                                    </div>
                                </div>

                                <div class="swiper-slide single-article-carousel__slide">
                                    <div class="single-article-carousel__media">
                                        <picture class="single-article-carousel__media-pic">
                                            <img class="single-article-carousel__media-img" src="./img/events.insm/single-events-hero.jpg" alt="">
                                        </picture>
                                    </div>
                                </div>

                                <div class="swiper-slide single-article-carousel__slide">
                                    <div class="single-article-carousel__media">
                                        <picture class="single-article-carousel__media-pic">
                                            <img class="single-article-carousel__media-img" src="./img/events.insm/single-events-hero.jpg" alt="">
                                        </picture>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="b_swiper__buttons single-article-carousel__buttons">
                            <div class="swiper-button-prev single-article-carousel__button-prev"></div>
                            <div class="swiper-button-next single-article-carousel__button-next"></div>
                        </div>
                    </div>
                    <div class="single-article__body">
                        <h2 class="single-article__title">Как уже неоднократно упомянуто, многие известные личности, инициированные </h2>
                        <div class="single-article__content wysiwyg">
                            <?php the_content(); ?>
                        </div>
                        <div class="single-article__buttons">
                            <a href="main.html" class="single-article__button">
                                <img class="single-article__button-icon" src="./img/single-event.insm/food.svg" alt="">
                                <span class="single-article__button-text">Menu</span>
                            </a>
                            <a href="#" class="single-article__button">
                                <img class="single-article__button-icon" src="./img/single-event.insm/bar.svg" alt="">
                                <span class="single-article__button-text">BAR</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="screener__bg container">
            <div class="screener__particles-upper">
            </div>
            <div class="screener__particles-bottom">
                <div class="blob js_use-bg" data-use-bg="./img/news.insm/blob-1.svg"></div>
                <div class="blob js_use-bg" data-use-bg="./img/news.insm/blob-2.svg"></div>
            </div>
        </div>
    </section>
</div>




<?php get_footer(); ?>
