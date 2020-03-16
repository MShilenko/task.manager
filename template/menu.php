<ul class="main-menu">
    <?php foreach ($menu as $link => $title): ?>
        <li<?=functions\isCurrentPage($link) ? ' class="active"' : '';?>><a href="<?=$link?>"><?=$title?></a></li>
    <?php endforeach;?>
</ul>