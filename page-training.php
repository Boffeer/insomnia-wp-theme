<?php get_header(); ?>

<?php
?>

<div class="screener screener--colored">
    <section class="training screener__layout" id="training">
        <div class="screener__content screener__container">
            <div class="screener__header">
                <h1 class="screener__title"><?php the_title(); ?></h1>
            </div>
            <div class="screener__body training__body">
                <div class="training-carousel">
                    <div class="swiper training-carousel__swiper">
                        <div class="swiper-wrapper">
                            <?php $mentors = get_field('training_mentors'); ?>
                            <?php foreach ($mentors as $key => $mentor) : ?>
                            <div class="swiper-slide training-carousel__slide">
                                <article class="trainer-card" data-id="<?php echo $key; ?>">
                                    <div class="trainer-card__media">
                                        <picture class="trainer-card__media-pic">
                                            <img class="trainer-card__media-img"
                                                 src="<?php echo get_image_url_by_id($mentor['photo']); ?>"
                                                 alt="<?php echo $mentor['name']; ?>"
                                            >
                                        </picture>
                                    </div>
                                    <h3 class="trainer-card__name"><?php echo typograph($mentor['name']); ?></h3>
                                    <p class="trainer-card__desc"><?php echo typograph($mentor['excerpt']); ?></p>
                                </article>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="training-carousel__pagination swiper-pagination"></div>
                </div>
                <div class="training__content">
                    <h2 class="training__title"><?php the_field('training_subtitle'); ?></h2>
                    <?php
                        $courses_id = 17;
                        $courses = get_field('prices_courses', $courses_id);
                    ?>
                    <?php foreach ($courses as $course) : ?>
                        <div class="training__course-card">
                            <h3 class="training__course-card-title"><?php echo typograph($course['prices_courses_title'])?></h3>
                            <p class="training__course-card-desc"><?php echo typograph($course['prices_courses_desc']); ?></p>
                            <div class="training__course-card-plan-list">
                                <div class="training__course-card-plan">
                                    <p class="training__course-card-plan-name">Будний день</p>
                                    <p class="training__course-card-plan-price"><?php echo $course['prices_courses_cost']; ?></p>
                                </div>
                                <div class="training__course-card-plan">
                                    <p class="training__course-card-plan-name">Выходной</p>
                                    <p class="training__course-card-plan-price"><?php echo $course['prices_courses_cost_weekend']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="screener__bg container">
            <div class="screener__particles-upper">
            </div>
            <div class="screener__particles-bottom">
                <div class="blob js_use-bg" data-use-bg="<?php echo THEME_STATIC; ?>/img/prices.insm/blob-1.svg"></div>
                <div class="blob js_use-bg" data-use-bg="<?php echo THEME_STATIC; ?>/img/prices.insm/blob-2.svg"></div>
            </div>
        </div>
    </section>
</div>



<?php get_footer(); ?>
