<?php

namespace functions;

/**
 * Get menu items and setting
 * @param  array  $menuItems
 * @param  string  $order
 * @param  string  $additionalClass
 * @return array $result
 */
function getMenuItems(array $menuItems = [], int $order = null, string $additionalClass = ''): array
{
    $result     = [];
    $sortColumn = array_column($menuItems, 'sort');

    if (!is_null($order)) {
        array_multisort($sortColumn, $order, $menuItems);
    }

    if(!empty($additionalClass)){
        $result['additionalClass'] = $additionalClass;
    }

    foreach ($menuItems as $item) {
        $result[$item['path']] = trimTitle($item['title']);
    }

    return $result;
}

/**
 * @param  string $string
 * @return string
 */
function trimTitle($string = ''): string
{
    return mb_strlen($string) > 15 ? mb_strimwidth($string, 0, 14, "...") : $string;
}
