         	</td>
		    <td class="right-collum-index">
				
		        <div class="project-folders-menu">
		            <ul class="project-folders-v">
		                <li class="project-folders-v-active">
							<?php if (!isset($_SESSION['auth'])): ?>	
		                		<a href="/?login=yes">Авторизация</a>
		    				<?php else: ?>
		    					<a href="/?login=no">Выйти</a>
		    				<?php endif; ?>	            	
		    			</li>
		    			<?php if (isset($_SESSION['auth'])): ?>	
							<li><a href="/profile/">Профиль</a></li>
							<li><a href="/posts/">Сообщения</a></li>
						<?php endif; ?>	 
		                <li><a href="#">Регистрация</a></li>
		                <li><a href="#">Забыли пароль?</a></li>
		            </ul>
		            <div class="clearfix"></div>
		        </div>
			        
		        <div class="index-auth">
		            <?php if ($isAuth): ?>
		                <?php include $_SERVER['DOCUMENT_ROOT'] . '/include/success.php'; ?>
		            <?php else: ?>
		                <?php if (!empty($_POST['userAuthentication']) && !$isAuth): ?>
		                    <?php include $_SERVER['DOCUMENT_ROOT'] . '/include/error.php'; ?>
		                <?php endif;?>
		                <?php if (isset($_GET['login']) && $_GET['login'] == 'yes'): ?>
		                    <form action="/?login=yes" method="POST">
		                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
		                            <?php if(isset($_COOKIE['login']) && !isset($_SESSION['auth'])): ?>
			                            <tr class="hide">
			                                <td class="iat">
			                                    <label for="login_id">Ваш e-mail:</label>
			                                    <input id="login_id" size="30" name="login" value="<?= htmlspecialchars($_COOKIE['login']) ?>">
			                                </td>
			                            </tr>
			                        <?php else: ?>    
			                        	<tr>
			                                <td class="iat">
			                                    <label for="login_id">Ваш e-mail:</label>
			                                    <input id="login_id" size="30" name="login" value="<?= htmlspecialchars($_POST['login'] ?? '') ?>">
			                                </td>
			                            </tr>
			                        <?php endif; ?>    	
		                            <tr>
		                                <td class="iat">
		                                    <label for="password_id">Ваш пароль:</label>
		                                    <input id="password_id" size="30" name="password" type="password" value="<?= htmlspecialchars($_POST['password'] ?? '') ?>">
		                                </td>
		                            </tr>
		                            <tr>
		                                <td><input name="userAuthentication" type="submit" value="Войти"></td>
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
        <?php functions\getMenuItems($menuItems, 'cmpDesc', 'bottom'); ?>
    </div>

    <div class="footer">&copy;&nbsp;<nobr><?= date('Y') ?></nobr> Project.</div>
</body>
</html>