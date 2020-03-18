<?php

namespace functions;

include $_SERVER['DOCUMENT_ROOT'] . '/functions/sortOptions.php';

/**
 * Get menu items and setting
 * @param  array  $menuItems
 * @param  string  $sort
 * @param  string  $additionalClass
 */
function getMenuItems(array $menuItems = [], string $sort, string $additionalClass = '')
{   
    usort($menuItems, 'functions\\' . $sort);

    include $_SERVER['DOCUMENT_ROOT'] . '/template/menu.php';
}

/**
 * @param  string $string
 * @return string
 */
function trimTitle($string = ''): string
{
    return mb_strimwidth($string, 0, 14, "...");
}

