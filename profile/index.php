<?php

include $_SERVER['DOCUMENT_ROOT'] . '/template/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';

$userProfile = functions\getUSerForProfile($_SESSION['userId']);
?>
<table class="profile">
    <tbody>
        <tr>
            <td>Id</td>
            <td><?= $userProfile['id'] ?></td>
        </tr>
        <tr>
            <td>Имя</td>
            <td><?= $userProfile['name'] ?></td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td><?= $userProfile['email'] ?></td>
        </tr>
        <tr>
            <td>Роли</td>
            <td><?= implode(', ', functions\getUSerGroupsForProfile($_SESSION['userId'])) ?></td>
        </tr>
        <tr>
            <td>Согласие на получение сообщений</td>
            <td><?= $userProfile['email_agreement'] == 1 ? 'Да' : 'Нет' ?></td>
        </tr>
    </tbody>
</table>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/template/footer.php';?>