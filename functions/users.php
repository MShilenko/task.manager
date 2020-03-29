<?php

namespace functions;

include_once $_SERVER['DOCUMENT_ROOT'] . '/functions/connectDB.php';

/**
 * @return array $result
 */
function getAllUSers(): array
{
    $result    = [];
    $dbConnect = connectDB();

    $smtm = $dbConnect->query('SELECT * FROM users');

    while ($row = $smtm->fetch(\PDO::FETCH_ASSOC)) {
        $result[] = $row;
    }

    $dbConnect = null;

    return $result;
}

/**
 * @return array $result
 */
function getAllUSersForAuthentication(): array
{
    $result    = [];
    $dbConnect = connectDB();

    $smtm = $dbConnect->query('SELECT id, email, password FROM users');

    while ($row = $smtm->fetch(\PDO::FETCH_ASSOC)) {
        $result[] = $row;
    }

    $dbConnect = null;

    return $result;
}

/**
 * User profile information
 * @param  int    $id
 * @return array $result
 */
function getUSerForProfile(int $id): array
{
    $result    = [];
    $dbConnect = connectDB();

    $smtm = $dbConnect->query(
        "SELECT users.id, users.name, users.email, users.email_agreement FROM users WHERE users.id = $id;"
    );

    while ($row = $smtm->fetch(\PDO::FETCH_ASSOC)) {
        $result = $row;
    }

    $dbConnect = null;

    return $result;
}

/**
 * User groups profile information
 * @param  int    $id
 * @return string $result
 */
function getUSerGroupsForProfile(int $id): array
{
    $result    = [];
    $dbConnect = connectDB();

    $smtm = $dbConnect->query(
        "SELECT groups.name FROM groups
            INNER JOIN user_group ON user_group.group_id = groups.id
            AND user_group.user_id = $id;"
    );

    foreach ($smtm->fetchAll(\PDO::FETCH_ASSOC) as $group) {
        $result[] = $group['name'];
    }

    $dbConnect = null;

    return $result;
}

/**
 * @param  int   $id
 * @return array $result
 */
function getUsersRolesForMessageForm(int $id): array
{
    $administratorId = 1;
    $writerId        = 2;
    $result          = [];
    $dbConnect       = connectDB();

    $smtm = $dbConnect->query(
        "SELECT DISTINCT users.id, users.name FROM users
            INNER JOIN user_group ON users.id = user_group.user_id
            AND (user_group.group_id = $administratorId OR user_group.group_id = $writerId)
            AND users.id <> $id"
    );

    while ($row = $smtm->fetch(\PDO::FETCH_ASSOC)) {
        $result[$row['id']] = $row['name'];
    }

    $dbConnect = null;

    return $result;
}
