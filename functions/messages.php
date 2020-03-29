<?php

namespace functions;

include_once $_SERVER['DOCUMENT_ROOT'] . '/functions/connectDB.php';

/**
 * @param  int   $id
 * @return array $result
 */
function getMessagesForUser(int $id): array
{
    $isViewed  = 1;
    $result    = [];
    $dbConnect = connectDB();

    $smtm = $dbConnect->query(
        "SELECT messages.id, messages.name, messages.viewed, messages_categories.name AS category_name FROM messages
            INNER JOIN messages_categories ON messages.category_id = messages_categories.id
            AND messages.recipient_id = $id"
    );

    while ($row = $smtm->fetch(\PDO::FETCH_ASSOC)) {
        $row['viewed'] == $isViewed ? $result['read'][] = $row : $result['unread'][] = $row;
    }

    $dbConnect = null;

    return $result;
}

/**
 * @param  int   $id
 * @return array $result
 */
function getMessage(int $id): array
{
    $result    = [];
    $dbConnect = connectDB();

    $smtm = $dbConnect->query(
        "SELECT messages.name, messages.create_date, messages.content, messages.viewed, messages.recipient_id, users.name AS user_name, users.email AS user_email FROM messages
            INNER JOIN users ON messages.recipient_id = users.id
            AND messages.id = $id"
    );

    while ($row = $smtm->fetch(\PDO::FETCH_ASSOC)) {
        $result = $row;
    }

    $dbConnect = null;

    return $result;
}

/**
 * @param  int   $id
 * @param  int   $viewed
 */
function setMessageRead(int $id, int $viewed)
{
    $isNotViewed = 0;
    $isViewed    = 1;

    if ($viewed === $isNotViewed) {
        $dbConnect = connectDB();

        $smtm = $dbConnect->prepare("UPDATE messages SET viewed = $isViewed WHERE id = :id");

        $smtm->execute(['id' => $id]);

        $dbConnect = null;
    }
}

/**
 * @return  int $viewed
 */
function getCategoriesForMessageForm(): array
{
    $isNotViewed = 0;
    $isViewed    = 1;
    $result      = [];
    $dbConnect   = connectDB();

    $smtm = $dbConnect->query(
        "SELECT id, name, parent_id FROM messages_categories"
    );

    while ($row = $smtm->fetch(\PDO::FETCH_ASSOC)) {
        $result[] = $row;
    }

    $dbConnect = null;

    return $result;
}

/**
 * @param  array   $messageOptions
 * @param  int   $userId
 * @return array $status
 */
function sendMessage(array $messageOptions, int $userId): string
{
    $status = '';

    if (empty($messageOptions['name']) || empty($messageOptions['content'])) {
        $status = 'Заполните поля';
    } else {
        $dbConnect = connectDB();

        $smtm = $dbConnect->prepare("INSERT INTO messages (name, content, user_id, recipient_id, category_id)
            VALUES (:name, :content, :user_id, :recipient_id, :category_id)");

        if ($smtm->execute([
            'name'         => htmlspecialchars($messageOptions['name']),
            'content'      => htmlspecialchars($messageOptions['content']),
            'user_id'      => $userId,
            'recipient_id' => $messageOptions['recipient'],
            'category_id'  => $messageOptions['category'],
        ])) {
            $status = 'Сообщение отправлено';
        } else {
            $status = 'Произошла ошибка при сохранении';
        }

        $dbConnect = null;
    }

    return $status;
}
