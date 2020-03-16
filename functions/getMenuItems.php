<?php

namespace functions;

/**
 * Get menu items and setting
 * @param  array  $menuItems
 * @param  string  $order
 * @param  string  $additionalClass
 */
function getMenuItems(array $menuItems = [], int $order = null, string $additionalClass = '')
{
    $menu       = [];
    $sortColumn = array_column($menuItems, 'sort');

    if (!is_null($order)) {
        array_multisort($sortColumn, $order, $menuItems);
    }

    foreach ($menuItems as $item) {
        $menu[$item['path']] = trimTitle($item['title']);
    }

    include $_SERVER['DOCUMENT_ROOT'] . '/template/menu.php';
}

/**
 * @param  string $string
 * @return string
 */
function trimTitle($string = ''): string
{
    return mb_strlen($string) > 15 ? mb_strimwidth($string, 0, 14, "...") : $string;
}
