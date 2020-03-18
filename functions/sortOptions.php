<?php

namespace functions;

/**
 * Sort option ASC
 */
function cmpAsc($a, $b): int
{
    return $a['sort'] > $b['sort'];
}

/**
 * Sort option DESC
 */
function cmpDesc($a, $b): int
{
    return $a['sort'] < $b['sort'];
}
