<?php

namespace route;

/**
 * Get menu items and setting	
 * @param  array  $menuItems
 * @param  string  $order
 * @return array $return
 */
function getMenuItems(array $menuItems = [], string $order = ''): array
{
    $result = [];
    $sortColumn = array_column($menuItems, 'sort');

    switch ($order) {
    	case 'asc':
    		array_multisort($sortColumn, SORT_ASC, $menuItems);
    		break;

    	case 'desc':
    		array_multisort($sortColumn, SORT_DESC, $menuItems);
    		break;	
    }

    foreach ($menuItems as $item) {
        $result[$item['path']] = $item['title'];
    }

    return $result;
}
