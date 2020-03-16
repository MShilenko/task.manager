<?php

namespace functions;

/**
 * @param  string  $link
 * @return boolean
 */
function isCurrentPage(string $link): bool
{
    return $link === parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
}
