<?php

if (!function_exists('get_single_buttons')) {
    function get_single_buttons($buttons) {
     if (empty($buttons)) return;

    ob_start(); ?>
    <div class="single-article__buttons">
        <?php foreach ($buttons as $button) :
            $button_icon = '';
            if (strtolower($button['text']) === "bar") {
                $button_icon = THEME_STATIC . '/img/single-event.insm/bar.svg';
            } else if (strtolower($button['text']) === "menu") {
                $button_icon = THEME_STATIC . '/img/single-event.insm/food.svg';
            } else if ($button['icon']) {
                $button_icon = get_image_url_by_id($button['icon']);
            }

            $button_link = '';
            if ($button['file']) {
                $button_link = $button['file']['url'];
            } else if ($button['url']) {
                $button_link = $button['url'];
            }
        ?>
            <a href="<?php echo $button_link;?>" <?php echo $button['file'] ? 'download' : ''; ?> class="single-article__button">
                <img class="single-article__button-icon" src="<?php echo $button_icon; ?>" alt="<?php echo $button['text']; ?>">
                <span class="single-article__button-text"><?php echo $button['text']; ?></span>
            </a>
        <?php endforeach; ?>
    </div>
    <?php return ob_get_clean();
    }
}