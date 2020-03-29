<?php 

include $_SERVER['DOCUMENT_ROOT'] . '/template/header.php'; 
include_once $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/functions/messages.php';

$users = functions\getUsersRolesForMessageForm($_SESSION['userId']);
$groups = functions\getCategoriesForMessageForm();

if(isset($_POST['message'])){
    echo functions\sendMessage($_POST, $_SESSION['userId']);
}
?>
<form id="sendMessage" method="POST">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">    
        <tr>
            <td class="iat">
                <label for="name">Заголовок:</label>
                <input id="name" size="30" name="name" type="text" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required>
            </td>
        </tr>
        <tr>
            <td class="iat">
                <label for="content">Текст сообщения:</label>
                <textarea id="content" size="30" name="content" required><?= htmlspecialchars($_POST['content'] ?? '') ?></textarea>
            </td>
        </tr>
        <tr>
            <td class="iat">
                <label for="recipient">Получатель:</label>
                <select id="recipient" name="recipient">
                    <?php foreach ($users as $id => $user): ?>
                        <option value="<?= $id ?>"><?= $user ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="iat">
                <label for="category">Раздел:</label>
                <select id="category" name="category">
                    <?php foreach ($groups as $group): ?>
                        <option class="<?= $group['parent_id'] != 0 ? 'child' : '' ?>" value="<?= $group['id'] ?>"><?= $group['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><input name="message" type="submit" value="Отправить"></td>
        </tr>
    </table>
</form>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/template/footer.php'; ?>