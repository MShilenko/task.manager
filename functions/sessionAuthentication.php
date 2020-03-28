<?php

namespace functions;

/**
 * @param  bool   $isAuth
 */
function sessionAuthentication(bool $isAuth)
{
    if (!isset($_SESSION['auth']) && $_SERVER['REQUEST_URI'] != '/?login=yes') {
        header("Location: /?login=yes");
        exit;
    }

    if ($isAuth && !isset($_SESSION['auth'])) {
        $_SESSION['auth'] = true;
    }

    if (isset($_GET['login']) && $_GET['login'] == 'no' && isset($_SESSION['auth'])) {
        unset($_SESSION['auth']);
    }

    if (isset($_GET['login']) && $_GET['login'] == 'no' && isset($_SESSION['userId'])) {
        unset($_SESSION['userId']);
    }

    if (isset($_SESSION['auth']) && isset($_COOKIE['login'])) {
        setcookie("login", $_COOKIE['login'], time() + 60 * 60 * 24 * 30, '/');
    }
}
