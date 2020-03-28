<?php

namespace functions;

/**
 * @return DB connect
 */
function connectDB()
{
    $host     = 'localhost';
    $user     = 'root';
    $password = '211187';
    $db       = 'task_manager';

    static $connection = null;

    if ($connection === null) {
        $connection = new \PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password) or die('error connection');
    }

    return $connection;
}
