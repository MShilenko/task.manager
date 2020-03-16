<?php

namespace functions;

/**
 * Return title for current page
 * @param  array  $menuItems
 * @return string $title
 */
function getTitle(array $menuItems = []): string
{
    for ($i = 0; $i < count($menuItems); $i++) {
        if (isCurrentPage($menuItems[$i]['path'])) {
            return $menuItems[$i]['title'];
        }
    }
}
