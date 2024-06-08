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

<?php $socials = get_socials(THEME_OPTIONS['socials']); ?>

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


<?php
$isModalPage = false;
if (is_singular('news')) {
    $slug = 'news';
    $isModalPage = true;
} else if (is_singular('services')) {
    $slug = 'services';
    $isModalPage = true;
}
if ($isModalPage) {
    $modal_title = get_the_title();
    $modal_content = get_the_content();
    $modal_thumb = get_post_thumb(get_the_ID());

    $prev_post = get_previous_post();

    $next_post = get_next_post();

    // Если пост первый, устанавливаем предыдущий пост как последний
    if (empty($prev_post)) {
        $prev_post = get_posts(array('numberposts' => 1, 'order' => 'DESC', 'post_type' => $slug))[0]->ID;
    } else {
        $prev_post = $prev_post->ID;
    }

    // Если пост последний, устанавливаем следующий пост как первый
    if (empty($next_post)) {
        $next_post = get_posts(array('numberposts' => 1, 'order' => 'ASC', 'post_type' => $slug))[0]->ID;
    } else {
        $next_post = $next_post->ID;
    }
} else {
    $modal_title = '';
    $modal_content = '';
    $modal_thumb = '';
    $next_post = '';
    $prev_post = '';
}
?>
<article class="modal-news b_modal" data-closer-type="inner" id="modal-news">
    <div class="modal-news__media <?php echo empty($modal_thumb) ? 'is-hidden' : ''; ?>">
        <picture class="modal-news__media-pic">
            <img class="modal-news__media-img" src="<?php echo $modal_thumb; ?>" alt="<?php echo $modal_title; ?>">
        </picture>
    </div>
    <div class="modal-news__body">
        <h3 class="modal-news__title"><?php echo $modal_title; ?></h3>
        <div class="modal-news__content wysiwyg">
            <?php echo $modal_content; ?>
        </div>
    </div>
    <div class="modal-news__buttons">
<!--        <a href="--><?php //the_permalink($prev_post); ?><!--" class="modal-news__button modal-news__button-prev" data-id="--><?php //echo $prev_post; ?><!--">-->
        <a class="modal-news__button modal-news__button-prev" data-id="<?php echo $next_post; ?>">
            <svg class="modal-news__button-icon">
                <use href="<?php echo THEME_STATIC; ?>/img/common.insm/angle-right.svg#angle-right"></use>
            </svg>
        </a>
<!--        <a href="--><?php //the_permalink($next_post); ?><!--" class="modal-news__button modal-news__button-next" data-id="--><?php //echo $next_post; ?><!--">-->
        <a class="modal-news__button modal-news__button-next" data-id="<?php echo $prev_post; ?>">
            <svg class="modal-news__button-icon">
                <use href="<?php echo THEME_STATIC; ?>/img/common.insm/angle-right.svg#angle-right"></use>
            </svg>
        </a>
    </div>
</article>

<article class="modal-trainer b_modal" data-closer-type="inner" id="modal-trainer">

    <div class="modal-trainer__media">
        <picture class="modal-trainer__media-pic">
            <img class="modal-trainer__media-img" src="" alt="">
        </picture>
    </div>
    <div class="modal-trainer__body">
        <h3 class="modal-trainer__title"></h3>
        <div class="modal-trainer__content wysiwyg"></div>
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
