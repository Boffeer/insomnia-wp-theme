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
//    $socials = get_socials(THEME_OPTIONS['socials']);
//    $email = THEME_OPTIONS['emails'];
//    $logo = THEME_OPTIONS['logo'];
$socials = get_socials(THEME_OPTIONS['socials']);
?>

<div class="fixed-widget-list">
    <div class="fixed-widget">
        <div class="socials fixed-widget__socials">

            <?php foreach ($socials as $social) : ?>
                <a class="socials__link socials__link--<?php echo $social['key']?>"
                   aria-label="<?php //echo $social['text']; ?>"
                   href="<?php echo $social['href']; ?>"
                   target="_blank"
                   rel="noopener noreferrer"
                >
                    <svg class="socials__icon">
                        <use href="<?php echo $social['icon']; ?>#<?php echo $social['key']; ?>"></use>
                    </svg>
                </a>
            <?php endforeach; ?>

            <?php $phone = explode_textarea(THEME_OPTIONS['phones'])[0]; ?>
            <?php if (!empty($phone)) : ?>
            <a class="socials__link socials__link--tel" aria-label="tel"
               href="<?php echo phone_to_href($phone); ?>"
            >
                <svg class="socials__icon">
                    <use href="<?php echo THEME_STATIC; ?>/img/common.insm/tel.svg#tel"></use>
                </svg>
            </a>
            <?php endif; ?>
        </div>

    </div>
    <?php if (!empty($phone)) : ?>
    <div class="fixed-widget fixed-widget--right fixed-widget-phone">
        <a href="<?php echo phone_to_href($phone); ?>" class="fixed-widget__text"><?php echo $phone; ?></a>
    </div>
    <?php endif; ?>
</div>
</div>

<article class="modal-news b_modal b_modal--scrollable" data-closer-type="inner" id="modal-news">
    <div class="modal-news__media">
        <picture class="modal-news__media-pic">
            <img class="modal-news__media-img" src="<?php echo THEME_STATIC; ?>/img/single-news.insm/news-cover.jpg" alt="">
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
                <use href="<?php echo THEME_STATIC; ?>/img/common.insm/angle-right.svg#angle-right"></use>
            </svg>
        </a>
        <a href="#" class="modal-news__button modal-news__button-next">
            <svg class="modal-news__button-icon">
                <use href="<?php echo THEME_STATIC; ?>/img/common.insm/angle-right.svg#angle-right"></use>
            </svg>
        </a>
    </div>
</article>
<article class="modal-trainer b_modal b_modal--scrollable" data-closer-type="inner" id="modal-trainer">
    <div class="modal-trainer__media">
        <picture class="modal-trainer__media-pic">
            <img class="modal-trainer__media-img" src="<?php echo THEME_STATIC; ?>/img/training.insm/trainer-full.jpg" alt="">
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
                <use href="<?php echo THEME_STATIC; ?>/img/common.insm/angle-right.svg#angle-right"></use>
            </svg>
        </a>
        <a href="#" class="modal-trainer__button modal-trainer__button-next">
            <svg class="modal-trainer__button-icon">
                <use href="<?php echo THEME_STATIC; ?>/img/common.insm/angle-right.svg#angle-right"></use>
            </svg>
        </a>
    </div>
</article>


<?php wp_footer(); ?>

</body>
</html>
