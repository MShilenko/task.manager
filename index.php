<?php include $_SERVER['DOCUMENT_ROOT'] . '/template/header.php'; ?>
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
                    <?php if ($isAuth): ?>
                        <?php include $_SERVER['DOCUMENT_ROOT'] . '/include/success.php'; ?>
                    <?php else: ?>
                        <?php if (!empty($_POST) && !$isAuth): ?>
                            <?php include $_SERVER['DOCUMENT_ROOT'] . '/include/error.php'; ?>
                        <?php endif;?>
                        <?php if (isset($_GET['login']) && $_GET['login'] == 'yes'): ?>
                            <form action="/?login=yes" method="POST">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td class="iat">
                                            <label for="login_id">Ваш e-mail:</label>
                                            <input id="login_id" size="30" name="login" value="<?= htmlspecialchars($_POST['login'] ?? '') ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="iat">
                                            <label for="password_id">Ваш пароль:</label>
                                            <input id="password_id" size="30" name="password" type="password" value="<?= htmlspecialchars($_POST['password'] ?? '') ?>">
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
<?php include $_SERVER['DOCUMENT_ROOT'] . '/template/footer.php' ?>
