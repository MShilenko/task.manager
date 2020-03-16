<?php

namespace functions;

/**
 * Return title for current page
 * @param  array  $menuItems
 * @return string $title
 */
function getTitle(array $menuItems = []): string
{
    $title = '';

    for ($i = 0; $i < count($menuItems); $i++) {
        if ($menuItems[$i]['path'] == $_SERVER['REQUEST_URI']) {
            return $title = $menuItems[$i]['title'];
        }
    }

    return $title;
}
