<?php get_header(); ?>


<div class="screener screener--colored">
    <section class="price screener__layout page-pice" id="price">
        <div class="screener__content screener__container">
            <div class="screener__header">
                <h1 class="screener__title">ЦЕНЫ</h1>
            </div>
            <div class="screener__body">
                <div class="tabs price__tabs">
                    <div class="tabs__button-list-wrap price__tabs-buttons-wrap">
                        <div class="tabs__button-list price__tabs-buttons" data-tabs="price">
                            <button class="tabs__button price__tabs-button">вейкборд</button>
                            <button class="tabs__button price__tabs-button">прокат</button>
                            <button class="tabs__button price__tabs-button">курсы</button>
                            <button class="tabs__button price__tabs-button">абонемент</button>
                        </div>
                    </div>
                    <div class="tabs__panel-list" data-tabs="price">
                        <div class="tabs__panel">
                            <?php $wakeboard = get_field('prices_wakeboard'); ?>
                            <?php foreach ($wakeboard as $table) : ?>
                                <?php $table = explode_textarea_matrix($table['prices_wake_table']); ?>
                                <div class="price-table">
                                    <?php foreach ($table as $key => $row) : ?>
                                        <div class="price-table__row <?php echo $key === 0 ? 'price-table__head' : ''; ?>">
                                            <?php foreach (explode_textarea($row) as $cell) : ?>
                                                <div class="price-table__cell"><?php echo typograph($cell); ?></div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="tabs__panel">
                            <?php $rent = get_field('prices_rent'); ?>
                            <?php foreach ($rent as $table) : ?>
                                <?php $table = explode_textarea_matrix($table['prices_rent_table']); ?>
                                <div class="price-table">
                                    <?php foreach ($table as $key => $row) : ?>
                                        <div class="price-table__row <?php echo $key === 0 ? 'price-table__head' : ''; ?>">
                                            <?php foreach (explode_textarea($row) as $cell) : ?>
                                                <div class="price-table__cell"><?php echo typograph($cell); ?></div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="tabs__panel">
                            <?php $courses = get_field('prices_courses'); ?>
                            <div class="price-table price-table--columned">
                                <div class="price-table__row price-table__head">
                                    <div class="price-table__cell">Услуга</div>
                                    <div class="price-table__cell">Будни</div>
                                    <div class="price-table__cell">Выходной</div>
                                </div>
                                <?php foreach ($courses as $course) : ?>
                                    <div class="price-table__row">
                                        <div class="price-table__cell">
                                            <p><?php echo typograph($course['prices_courses_title']); ?></p>
                                            <p><?php echo typograph($course['prices_courses_desc']); ?></p>
                                        </div>
                                        <div class="price-table__cell">
                                            <p>Будни</p>
                                            <p><?php echo typograph($course['prices_courses_cost']); ?></p>
                                        </div>
                                        <div class="price-table__cell">
                                            <p>Выходной</p>
                                            <p><?php echo typograph($course['prices_courses_cost_weekend']); ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="tabs__panel">
                            <?php
                                $season_pass = array(
                                    'title' => get_field('prices_season_pass_title'),
                                    'img' => get_image_url_by_id(get_field('field_prices_season_pass_img')),
                                    'cards' => get_field('prices_season_pass'),
                                );
                            ?>
                            <div class="price-offer">
                                <div class="price-offer__media">
                                    <picture class="price-offer__media-pic">
                                        <img class="price-offer__media-img"
                                             src="<?php echo $season_pass['img']; ?>"
                                             alt=""
                                        >
                                    </picture>
                                </div>
                                <div class="price-offer__content">
                                    <h2 class="price-offer__title"><?php echo $season_pass['title']; ?></h2>
                                    <?php foreach ($season_pass['cards'] as $card) : ?>
                                        <div class="price-offer__card">
                                            <div class="price-offer__card-content">
                                                <h3 class="price-offer__card-title">
                                                    <?php echo typograph($card['prices_season_pass_title']); ?>
                                                </h3>
                                                <p class="price-offer__card-desc">
                                                    <?php echo typograph($card['prices_season_pass_desc']); ?>
                                                </p>
                                            </div>
                                            <p class="price-offer__card-cost">
                                                <?php echo typograph($card['prices_season_pass_price']); ?>
                                            </p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="screener__bg container">
            <div class="screener__particles-upper">
            </div>
            <div class="screener__particles-bottom">
                <div class="blob js_use-bg" data-use-bg="./img/prices.insm/blob-1.svg"></div>
                <div class="blob js_use-bg" data-use-bg="./img/prices.insm/blob-2.svg"></div>
            </div>
        </div>
    </section>
</div>



<?php get_footer(); ?>
