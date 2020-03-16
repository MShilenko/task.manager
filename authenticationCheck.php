<?php

/**
 * @param  array  $logins
 * @param  array  $passwords
 * @return array $status
 */
function authenticationCheck($logins = [], $passwords = [])
{
    for ($i = 0; $i < count($logins); $i++) {
        if ($logins[$i] === $_POST['login'] && $passwords[$i] === $_POST['password']) {
            return true;
        }
    }

    return false;
}
