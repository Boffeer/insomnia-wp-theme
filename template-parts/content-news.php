<?php
    $event = array(
        'subtitle' => get_field('events_subtitle'),
        'gallery' => get_field('events_gallery'),
        'icon' => get_field('events_icon'),
        'excerpt' => get_the_excerpt(),
    );

    if (empty($event['excerpt'])) {
        $event['excerpt'] = $event['subtitle'];
    }

    if (!empty($event['icon'])) {
        $event['icon'] = get_image_url_by_id($event['icon']);
    }

    if (!empty($event['gallery'])) {
        $event['thumb'] = get_image_url_by_id($event['gallery'][0]);
    }
?>
<article class="news-card" data-id="<?php the_ID(); ?>">
    <h3 class="news-card__title">
        <?php if ($event['icon']) : ?>
            <img class="news-card__icon" src="<?php echo $event['icon']; ?>" alt="<?php the_title(); ?>">
        <?php endif; ?>
        <a href="<?php the_permalink(); ?>" class="news-card__link"><?php the_title(); ?></a>
    </h3>
    <p class="news-card__exerpt"><?php echo $event['excerpt'];?></p>
    <div class="news-card__media">
        <picture class="news-card__media-pic">
            <img class="news-card__media-img" src="<?php echo $event['thumb']; ?>" alt="<?php the_title(); ?>">
        </picture>
    </div>
</article>
