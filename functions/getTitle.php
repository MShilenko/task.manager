<?php

namespace functions;

/**
 * Return title for current page
 * @param  array  $menuItems
 * @return string $title
 */
function getTitle(array $menuItems = []): string
{
	$title = 'Страница';

    foreach ($menuItems as $menuItem) {
        if (isCurrentPage($menuItem['path'])) {
            return $menuItem['title'];
        }
    }

    return $title;
}
