<?php
$secondMenu = route\getMenuItems($menuItems);
?>    
    <div class="clearfix">
        <ul class="main-menu bottom">
            <?php foreach($secondMenu as $link => $title): ?>
                <li><a href="<?=$link?>"><?=$title?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="footer">&copy;&nbsp;<nobr><?=date('Y')?></nobr> Project.</div>

</body>
</html>