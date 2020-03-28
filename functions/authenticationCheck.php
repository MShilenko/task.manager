<?php

namespace functions;

include $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';

/**
 * @return mixed
 */
function authenticationCheck(): bool
{
    $users = getAllUSersForAuthentication();

    for ($i = 0; $i < count($users); $i++) {
        if ($users[$i]['email'] === $_POST['login'] && password_verify($_POST['password'], $users[$i]['password'])) {
            $_SESSION['userId'] = $users[$i]['id'];
            setcookie("login", $users[$i]['email'], time() + 60 * 60 * 24 * 30, '/');

            return true;
        }
    }

    return false;
}