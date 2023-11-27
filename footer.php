<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sklh
 */

?>
</main>

<?php
//    $phones = explode_textarea(THEME_OPTIONS['phones']);
    $socials = get_socials(THEME_OPTIONS['socials']);
//    $email = THEME_OPTIONS['emails'];
    $logo = THEME_OPTIONS['logo'];
?>

<div class="fixed-widget-list">
    <div class="fixed-widget">
        <div class="socials fixed-widget__socials">

            <a class="socials__link socials__link--telegram" aria-label="TG"
               href="https://t.me" target="_blank" rel="noopener noreferrer"
            >
                <svg class="socials__icon">
                    <use href="./img/common.insm/telegram.svg#telegram"></use>
                </svg>
            </a>

            <a class="socials__link socials__link--whatsapp" aria-label="WA"
               href="https://wa.me" target="_blank" rel="noopener noreferrer"
            >
                <svg class="socials__icon">
                    <use href="./img/common.insm/whatsapp.svg#whatsapp"></use>
                </svg>
            </a>

            <a class="socials__link socials__link--instagram" aria-label="IG"
               href="https://instagram.com" target="_blank" rel="noopener noreferrer"
            >
                <svg class="socials__icon">
                    <use href="./img/common.insm/instagram.svg#instagram"></use>
                </svg>
            </a>

            <a class="socials__link socials__link--tel" aria-label="tel"
               href="tel:+711111111" target="_blank" rel="noopener noreferrer"
            >
                <svg class="socials__icon">
                    <use href="./img/common.insm/tel.svg#tel"></use>
                </svg>
            </a>

        </div>

    </div>
    <div class="fixed-widget fixed-widget--right fixed-widget-phone">
        <a href="tel:+790000000" class="fixed-widget__text">+7 900 00 00 00</a>
    </div>
</div>
</div>

<article class="modal-news b_modal b_modal--scrollable" data-closer-type="inner" id="modal-news">
    <div class="modal-news__media">
        <picture class="modal-news__media-pic">
            <img class="modal-news__media-img" src="./img/single-news.insm/news-cover.jpg" alt="">
        </picture>
    </div>
    <div class="modal-news__body">
        <h3 class="modal-news__title">Summer contest 2023</h3>
        <div class="modal-news__content wysiwyg">
            <p>
                Вейкбординг является экстремальным видом спорта, который стал очень популярным в России за последние несколько лет. Соревнования по этому виду спорта проводятся на специальных водных трассах, оборудованных подъемными механизмами - катером и тросом. Участники соревнований должны проехать по трассе и выполнить различные трюки на вейкборде.
            </p>
        </div>
    </div>
    <div class="modal-news__buttons">
        <a href="#" class="modal-news__button modal-news__button-prev">
            <svg class="modal-news__button-icon">
                <use href="./img/common.insm/angle-right.svg#angle-right"></use>
            </svg>
        </a>
        <a href="#" class="modal-news__button modal-news__button-next">
            <svg class="modal-news__button-icon">
                <use href="./img/common.insm/angle-right.svg#angle-right"></use>
            </svg>
        </a>
    </div>
</article>
<article class="modal-trainer b_modal b_modal--scrollable" data-closer-type="inner" id="modal-trainer">
    <div class="modal-trainer__media">
        <picture class="modal-trainer__media-pic">
            <img class="modal-trainer__media-img" src="./img/training.insm/trainer-full.jpg" alt="">
        </picture>
    </div>
    <div class="modal-trainer__body">
        <h3 class="modal-trainer__title">Иванов Александр Иванович</h3>
        <div class="modal-trainer__content wysiwyg">
            <p>Картельные сговоры не допускают ситуации, при которой явные признаки победы институционализации, вне зависимости от их уровня, должны быть представлены в исключительно положительном свете. С другой стороны, перспективное планирование не даёт нам иного выбора, кроме определения приоретизации разума над.</p>
        </div>
    </div>
    <div class="modal-trainer__buttons">
        <a href="#" class="modal-trainer__button modal-trainer__button-prev">
            <svg class="modal-trainer__button-icon">
                <use href="./img/common.insm/angle-right.svg#angle-right"></use>
            </svg>
        </a>
        <a href="#" class="modal-trainer__button modal-trainer__button-next">
            <svg class="modal-trainer__button-icon">
                <use href="./img/common.insm/angle-right.svg#angle-right"></use>
            </svg>
        </a>
    </div>
</article>


<?php wp_footer(); ?>

</body>
</html>
