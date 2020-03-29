<?php 

include $_SERVER['DOCUMENT_ROOT'] . '/template/header.php'; 
include $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';
include $_SERVER['DOCUMENT_ROOT'] . '/functions/messages.php';

$userGroups = functions\getUSerGroupsForProfile($_SESSION['userId']);
$userMessages = functions\getMessagesForUser($_SESSION['userId']);
?>
<?php if (in_array('User', $userGroups) && !in_array('Writer', $userGroups)): ?>
    <p>Вы сможете отправлять сообщения после прохождения модерации.</p>
<?php endif; ?>
<?php if (isset($_GET['message'])): ?>
    <?php $message = functions\getMessage($_GET['message']); ?>
    <?php if ($message['recipient_id'] === $_SESSION['userId']): ?>
        <?php functions\setMessageRead($_GET['message'], $message['viewed']); ?>
        <table class="profile">
            <tbody>
                <tr>
                    <td>Заголовок / Дата и время отправки</td>
                    <td><?= $message['name'] ?> / <?= $message['create_date'] ?></td>
                </tr>
                <tr>
                    <td>Отправитель / E-mail</td>
                    <td><?= $message['user_name'] ?> / <?= $message['user_email'] ?></td>
                </tr>
                <tr>
                    <td>Сообщение</td>
                    <td><?= $message['content'] ?></td>
                </tr>
            </tbody>
        </table>
    <?php else: ?>
        <p>Доступ запрещен. Сообщение предназначено не вам.</p>            
    <?php endif; ?>        
<?php else: ?>
    <?php if (in_array('Administrator', $userGroups) || in_array('Writer', $userGroups)): ?>
        <div class="send-message-button"><a href="/posts/add/">Написать сообщение</a></div>
        <table class="messages">
            <tbody>
                <tr>
                    <th>Прочитанные</th>
                    <th>Не прочитанные</th>
                </tr>
                <tr>
                    <td>
                        <?php if (isset($userMessages['read'])): ?>
                            <ul>
                                <?php foreach ($userMessages['read'] as $message): ?>
                                    <li><a href="/posts/?message=<?= $message['id'] ?>"><?= $message['category_name'] ?> | <?= $message['name'] ?></a></li>
                                <?php endforeach; ?>    
                            </ul>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (isset($userMessages['unread'])): ?>
                            <ul>
                                <?php foreach ($userMessages['unread'] as $message): ?>
                                    <li><a href="/posts/?message=<?= $message['id'] ?>"><?= $message['category_name'] ?> | <?= $message['name'] ?></a></li>
                                <?php endforeach; ?>    
                            </ul>
                        <?php endif; ?>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php endif; ?>
<?php endif; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/template/footer.php'; ?>