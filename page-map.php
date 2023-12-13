<?php get_header(); ?>

<?php
    $address = THEME_OPTIONS['address'];
    $coordinates = THEME_OPTIONS['coordinates'];
    $map_iframe_url = THEME_OPTIONS['map_iframe_url'];
?>

<div class="screener">
    <section class="map screener__layout" id="map">
        <div class="screener__content screener__container">
            <div class="screener__header">
                <h1 class="screener__title">Карта</h1>
                <div class="screener__header-columns">
                    <div class="screener__haeder-column">
                        <h3 class="screenser__header-column-title">Адрес</h3>
                        <div class="screenser__header-column-content wysiwyg">
                            <p>
                                <strong>
                                    <a href="#">
                                        <?php echo typograph($address); ?>
                                    </a>
                                </strong>
                            </p>
                        </div>
                    </div>
                    <div class="screener__haeder-column">
                        <h3 class="screenser__header-column-title">Координаты</h3>
                        <div class="screenser__header-column-content wysiwyg">
                            <p>
                                <strong>
                                <a href="#">
                                    <?php echo $coordinates; ?>
                                </a>
                                </strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="screener__body">
                <div class="map__frame">
                    <iframe src="<?php echo $map_iframe_url; ?>" frameborder="0"></iframe>
                </div>
            </div>
        </div>
        <div class="screener__bg">
            <div class="screener__particles-upper">
            </div>
            <div class="screener__particles-bottom">
                <div class="blob js_use-bg" data-use-bg="<?php echo THEME_STATIC; ?>/img/map.insm/blob-2.svg"></div>
                <div class="blob js_use-bg" data-use-bg="<?php echo THEME_STATIC; ?>/img/map.insm/blob-1.svg"></div>
            </div>
        </div>
    </section>
</div>



<?php get_footer(); ?>
