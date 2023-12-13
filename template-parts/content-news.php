<?php
$news = array(
    'icon' => get_field('news_icon'),
    'excerpt' => get_the_excerpt(),
    'thumb' => get_post_thumb(get_the_ID()),
    'slug' => get_post_field('post_name', get_the_ID()),
);

if (!empty($news['icon'])) {
    $news['icon'] = get_image_url_by_id($news['icon']);
}
global $wp_query;
$card_modifier = '';

if (is_single() && $wp_query->post->ID === get_the_ID()) {
//    get_vd($wp_query);
    $card_modifier = 'active';
}

?>

<article class="news-card <?php echo $card_modifier; ?>" data-id="<?php the_ID(); ?>" data-slug="<?php echo $news['slug']; ?>">
    <h3 class="news-card__title">
        <?php if ($news['icon']) : ?>
            <img class="news-card__icon" src="<?php echo $news['icon']; ?>" alt="<?php the_title(); ?>">
        <?php endif; ?>
<!--        <a href="--><?php //the_permalink(); ?><!--" class="news-card__link">--><?php //the_title(); ?><!--</a>-->
        <span class="news-card__link"><?php the_title(); ?></span>
    </h3>
    <p class="news-card__exerpt"><?php echo $news['excerpt'];?></p>
    <div class="news-card__media">
        <picture class="news-card__media-pic">
            <img class="news-card__media-img" src="<?php echo $news['thumb']; ?>" alt="<?php the_title(); ?>">
        </picture>
    </div>
</article>
