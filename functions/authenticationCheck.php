<?php

namespace functions;

/**
 * @param  array  $logins
 * @param  array  $passwords
 * @return bool
 */
function authenticationCheck(array $logins, array $passwords): bool
{
    for ($i = 0; $i < count($logins); $i++) {
        if ($logins[$i] === $_POST['login'] && $passwords[$i] === $_POST['password']) {
            return true;
        }
    }

    return false;
}
