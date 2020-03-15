<?php

include __DIR__ . '/include/success.php';

/**
 * @param  array  $logins
 * @param  array  $passwords
 * @return array  $users
 */
function getUsers($logins = [], $passwords = [])
{
    $result = [];

    foreach ($logins as $id => $login) {
        $result[$id] = [
            'login'    => $login['login'],
            'password' => $passwords[$id]['password'],
        ];
    }

    return $result;
}

/**
 * @param  array  $logins
 * @param  array  $passwords
 * @return array $status
 */
function authenticationСheck($logins = [], $passwords = [])
{
    $result = [
        'success' => false,
        'error'   => false,
    ];

    $users = getUsers($logins, $passwords);

    if (!empty($_POST)) {
        if (!empty($_POST['login']) && !empty($_POST['password'])) {
            foreach ($users as $user) {
                if ($_POST['login'] == $user['login'] && $_POST['password'] == $user['password']) {
                    $result['success'] = true;
                    break;
                } else {
                    $result['error'] = true;
                }
            }
        }
    }

    return $result;
}
