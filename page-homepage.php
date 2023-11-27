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
$socials = get_socials(THEME_OPTIONS['socials']);
$phones = explode_textarea(THEME_OPTIONS['phones']);
?>

    <section class="hero section">
        <div class="hero__container container">
            <?php
                $title = carbon_get_the_post_meta('hero_title');
                $locations_from = explode_textarea(carbon_get_the_post_meta('location_start_names'));
                $locations_to = explode_textarea(carbon_get_the_post_meta('location_end_names'));
            ?>
            <div class="hero__offer">
                <h2 class="section-title hero__title">
                    <?php echo typograph($title); ?>
                </h2>
                <div class="bookform hero__bookform js_form"
                     data-route="<?php echo FORM_URLS['ajax']?>"
                     data-action="filter_cars"
                >
                    <div class="select hero__bookform-select">
                        <select class="select__input"
                                name="location_start"
                                tabindex="-1"
                                required>
                            <option value="" disabled selected>Pick-up location</option>
                            <?php foreach ($locations_from as $location) : ?>
                                <option value="<?php echo $location; ?>"><?php echo $location; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button class="select__toggle" type="button">Pick-up location</button>
                        <ul class="select__list">
                            <?php foreach ($locations_from as $location) : ?>
                                <li>
                                    <button class="select__option" type="button"><?php echo $location; ?></button>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="select hero__bookform-select">
                        <!-- <div class="select__label">Откуда вы узнали о нас?</div> -->
                        <select class="select__input"
                                name="location_end"
                                tabindex="-1"
                                required>
                            <!-- <option value="" disabled selected>Выберите место получения</option> -->
                            <option value="" disabled selected>Drop-off location</option>
                            <?php foreach ($locations_to as $location) : ?>
                                <option value="<?php echo $location; ?>"><?php echo $location; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button class="select__toggle" type="button">Drop-off location</button>
                        <ul class="select__list">
                            <?php foreach ($locations_to as $location) : ?>
                                <li>
                                    <button class="select__option" type="button"><?php echo $location; ?></button>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="hero__bookform-range b_rangepicker" data-lang="ru">
                        <label class="input b_datepicker js_form__control" data-lang="ru">
                            <span class="b_datepicker__display">Start dat</span>
                            <input
                                    class="input__field"
                                    name="date_start"
                                    type="text"
                                    placeholder="Start date"
                                    readonly
                                    required
                            >
                        </label>

                        <label class="input b_datepicker js_form__control" data-lang="ru">
                            <span class="b_datepicker__display">End date</span>
                            <input
                                    class="input__field"
                                    name="date_end"
                                    type="text"
                                    placeholder="End date"
                                    readonly
                                    required
                            >
                        </label>

                    </div>
                    <div class="timepicker hero__bookform-timepicker"
                         data-min="08:00"
                         data-max="20:00"
                         data-step="15"
                    >
                        <div class="timepicker__control">
                            <div class="timepicker__drag"></div>
                        </div>
                        <input class="timepicker__value" type="text" name="time_start" inputmode="numeric">
                    </div>
                    <div class="timepicker hero__bookform-timepicker"
                         data-min="08:00"
                         data-max="20:00"
                         data-step="15"
                    >
                        <div class="timepicker__control">
                            <div class="timepicker__drag"></div>
                        </div>
                        <input class="timepicker__value" type="text" name="time_end" inputmode="numeric" value="14:10">
                    </div>
                    <button class="button-primary hero__bookform-submit js_form__submit">Подобрать автомобиль</button>
                </div>
            </div>
            <div class="hero-gallery">
                <?php
                    $banners = carbon_get_the_post_meta('banners');
                ?>
                <div class="swiper hero-gallery__swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($banners as $banner) : ?>
                        <div class="swiper-slide hero-gallery__slide">
                            <div class="hero__media">
                                <picture class="hero__media-pic">
                                    <img class="hero__media-img"
                                         src="<?php echo get_image_url_by_id($banner['img']); ?>"
                                         alt="<?php echo $banner['text']; ?>"
                                    >
                                </picture>
                                <div class="hero__meida-caption">
                                    <div class="wysiwyg">
                                        <p><?php echo typograph($banner['text']); ?></p>
                                    </div>
                                    <a href="<?php echo $banner['link_url'];?>" class="hero__media-caption-link link"><?php echo $banner['link_text'];?></a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="b_swiper__buttons hero-gallery__buttons">
                    <div class="swiper-button-prev hero-gallery__button-prev"></div>
                    <div class="swiper-button-next hero-gallery__button-next"></div>
                </div>
            </div>

            <?php $bullets = carbon_get_the_post_meta('bullets'); ?>
            <div class="hero__bullets">
                <?php foreach ($bullets as $bullet) :  ?>
                <div class="bullet-card">
                    <div class="bullet-card__media">
                        <picture class="bullet-card__pic">
                            <img class="bullet-card__img"
                                 src="<?php echo wp_get_attachment_image_url($bullet['icon']) ?>"
                                 alt="<?php echo $bullet['title']; ?>"
                            >
                        </picture>
                    </div>
                    <div class="bullet-card__content wysiwyg">
                        <h3><?php echo $bullet['title']; ?></h3>
                        <p><?php echo $bullet['text']; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="shelf section" id="cars">
        <div class="shelf__container container">
            <h2 class="section-title shelf__title">
                Выберите свой <br>автомобиль
            </h2>
            <div class="shelf__content">
                <?php get_template_part( 'template-parts/content', 'cars' ); ?>
                <?php get_template_part( 'template-parts/content', 'cars' ); ?>
                <?php get_template_part( 'template-parts/content', 'cars' ); ?>
                <?php get_template_part( 'template-parts/content', 'cars' ); ?>
                <?php get_template_part( 'template-parts/content', 'cars' ); ?>
                <?php get_template_part( 'template-parts/content', 'cars' ); ?>
            </div>
            <div class="shelf__buttons">
                <button class="button-secondary shelf__button-more">Показать еще машины</button>
            </div>
        </div>
    </section>


    <section class="section reviews">
        <div class="container reviews__container">
            <h2 class="section-title section-text--center reviews__title">Отзывы</h2>
            <div class="reviews-carousel">
                <div class="swiper reviews-carousel__swiper">
                    <div class="swiper-wrapper">

                        <?php for ($i = 0; $i < 6; $i++) : ?>
                            <div class="swiper-slide reviews-carousel__slide">
                                <?php get_template_part( 'template-parts/content', 'reviews' ); ?>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
                <div class="swiper-scrollbar reviews-carousel__scrollbar"></div>

                <div class="swiper-buttons reviews-carousel__buttons">
                    <div class="swiper-button-prev reviews-carousel__button-prev"></div>
                    <div class="swiper-button-next reviews-carousel__button-next"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section blog" id="blog">
        <h1 class="page-title section-title">Блог</h1>
        <div class="container blog__container">
            <div class="blog__masonry">
                <?php for ($i = 0; $i < 6; $i++) : ?>
                    <?php get_template_part( 'template-parts/content', 'blog' ); ?>
                <?php endfor; ?>
            </div>
<!--            <ul class="pagination">-->
<!--                <li><a href="#"><</a></li>-->
<!--                <li class="active">-->
<!--                    <span>1</span>-->
<!--                </li>-->
<!--                <li><a href="#">2</a></li>-->
<!--                <li><a href="#">3</a></li>-->
<!--                <li><a href="#">4</a></li>-->
<!--                <li><a href="#">5</a></li>-->
<!--                <li><a href="#">></a></li>-->
<!--            </ul>-->
        </div>
    </section>


    <section class="section faq" id="faq">
        <div class="container faq__container">
            <h2 class="section-title faq__title" data-aos="fade-up">Часто задаваемые <br> вопросы</h2>
            <div class="faq__content">
                <div class="faq__list">
                    <?php for ($i = 0; $i < 6; $i++) : ?>
                        <?php get_template_part( 'template-parts/content', 'faq' ); ?>
                    <?php endfor; ?>
                </div>
                <div class="faq-help">
                    <div class="faq-help__media">
                        <picture class="faq-help__media-pic">
                            <!-- <source srcset="./img/faq/faq-hero.jpg.webp" type="image/webp"> -->
                            <img src="./img/common/loader.svg" data-src="./img/faq.crrt/faq-hero.jpg" alt="" class="faq-help__media-img lazy">
                        </picture>
                    </div>
                    <h3 class="faq-help__title">Не нашли ответа <br> на&nbsp;свой вопрос?</h3>
                    <p class="faq-help__desc">
                        Свяжитесь с нами любым удобным&nbsp;способом — ответим на всё подробно.
                    </p>

                    <div class="faq__socials socials">
                        <?php foreach ($socials as $social) : ?>
                            <a class="socials__link socials__link--<?php echo $social['key']; ?>" aria-label="<?php echo isset($social['text']) ? $social['text'] : ''; ?>"
                               href="<?php echo $social['href']; ?>" target="_blank" rel="noopener noreferrer"
                            >
                                <img class="socials__icon" src="<?php echo $social['icon']; ?>" alt="<?php echo isset($social['text']) ? $social['text'] : ''; ?>">
                            </a>
                        <?php endforeach; ?>
                        <a href="#" class="socials__link">
                            <svg class="socials__icon">
                                <use xlink:href="./img/faq.crrt/mail.svg#mail" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>




<?php
get_footer();
