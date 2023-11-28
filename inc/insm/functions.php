<?php

function get_buttons_links($input) {
    $links = explode_textarea_matrix($input);

    foreach ($links as $key => $link) {
        $link = explode_textarea($link);
        $links[$key] = array(
            'url' => $link[0],
            'text' => $link[1],
            'type' => 'download',
        );

        $url = explode('||', $links[$key]['url']);
        if (isset($url[1])) {
            $links[$key]['type'] = 'link';
        }

        if (isset($link[2])) {
            $links[$key]['icon'] = $link[2];
            continue;
        } else if (strtolower($links[$key]['text']) === "bar") {
            $links[$key]['icon'] = THEME_STATIC . '/img/single-event.insm/bar.svg';
        } else if (strtolower($links[$key]['text']) === "menu") {
            $links[$key]['icon'] = THEME_STATIC . '/img/single-event.insm/food.svg';
        }
    }

    return $links;
}
