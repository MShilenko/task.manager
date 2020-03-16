<?php
if (!empty($_POST)) {
    include $_SERVER['DOCUMENT_ROOT'] . '/include/logins.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/include/passwords.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/authenticationCheck.php';
    $isAuth = authenticationCheck($logins, $passwords);
}
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
        <ul class="main-menu">
            <li><a href="#">Главная</a></li>
            <li><a href="#">О нас</a></li>
            <li><a href="#">Контакты</a></li>
            <li><a href="#">Новости</a></li>
            <li><a href="#">Каталог</a></li>
        </ul>
    </div>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="left-collum-index">

                <h1>Возможности проекта —</h1>
                <p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с друзьями и просматривать списки друзей.</p>


            </td>
            <td class="right-collum-index">

                <div class="project-folders-menu">
                    <ul class="project-folders-v">
                        <li class="project-folders-v-active"><a href="/?login=yes">Авторизация</a></li>
                        <li><a href="#">Регистрация</a></li>
                        <li><a href="#">Забыли пароль?</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="index-auth">
                    <?php if ($isAuth ?? false): ?>
                        <?php include $_SERVER['DOCUMENT_ROOT'] . '/include/success.php';?>
                    <?php else: ?>
                        <?php if (isset($isAuth) && $isAuth == false): ?>
                            <?php include $_SERVER['DOCUMENT_ROOT'] . '/include/error.php';?>
                        <?php endif;?>
                        <?php if (isset($_GET['login']) && $_GET['login'] == 'yes'): ?>
                            <form action="/?login=yes" method="POST">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td class="iat">
                                            <label for="login_id">Ваш e-mail:</label>
                                            <input id="login_id" size="30" name="login" value="<?=htmlspecialchars($_POST['login'] ?? '')?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="iat">
                                            <label for="password_id">Ваш пароль:</label>
                                            <input id="password_id" size="30" name="password" type="password" value="<?=htmlspecialchars($_POST['password'] ?? '')?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="submit" value="Войти"></td>
                                    </tr>
                                </table>
                            </form>
                        <?php endif;?>
                    <?php endif;?>
                </div>

            </td>
        </tr>
    </table>

    <div class="clearfix">
        <ul class="main-menu bottom">
            <li><a href="#">Главная</a></li>
            <li><a href="#">О нас</a></li>
            <li><a href="#">Контакты</a></li>
            <li><a href="#">Новости</a></li>
            <li><a href="#">Каталог</a></li>
        </ul>
    </div>

    <div class="footer">&copy;&nbsp;<nobr><?=date('Y')?></nobr> Project.</div>

</body>
</html>