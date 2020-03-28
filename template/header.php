<?php

session_start();
$isAuth = false;

if (!empty($_POST)) {
    include $_SERVER['DOCUMENT_ROOT'] . '/dataArrays/logins.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/dataArrays/passwords.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/functions/authenticationCheck.php';

    $isAuth = functions\authenticationCheck($logins, $passwords);
}

include $_SERVER['DOCUMENT_ROOT'] . '/functions/getTitle.php';
include $_SERVER['DOCUMENT_ROOT'] . '/dataArrays/main_menu.php';
include $_SERVER['DOCUMENT_ROOT'] . '/functions/getMenuItems.php';
include $_SERVER['DOCUMENT_ROOT'] . '/functions/isCurrentPage.php';
include $_SERVER['DOCUMENT_ROOT'] . '/functions/sessionAuthentication.php';

functions\sessionAuthentication($isAuth);

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="/styles.css" rel="stylesheet">
    <title>Project - ведение списков</title>
</head>

<body>

    <div class="header">
        <div class="logo"><img src="/i/logo.png" width="68" height="23" alt="Project"></div>
        <div class="clearfix"></div>
    </div>

    <div class="clear">
        <?php functions\getMenuItems($menuItems, 'cmpAsc'); ?>
    </div>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td class="left-collum-index">

                    <h1><?= functions\getTitle($menuItems) ?></h1>