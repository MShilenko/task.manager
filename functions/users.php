<?php

namespace functions;

include $_SERVER['DOCUMENT_ROOT'] . '/functions/connectDB.php';

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
 * @param  int    $id [description]
 * @return string $result
 */
function getUSerGroupsForProfile(int $id): string
{
    $result    = [];
    $dbConnect = connectDB();

    $smtm = $dbConnect->query(
        "SELECT groups.name FROM groups
        INNER JOIN user_group ON user_group.group_id = groups.id
        INNER JOIN users ON user_group.user_id = users.id
        AND users.id = $id;"
    );

    foreach ($smtm->fetchAll(\PDO::FETCH_ASSOC) as $group) {
        $result[] = $group['name'];
    }

    $dbConnect = null;

    return implode(', ', $result);
}
