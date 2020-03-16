<ul class="main-menu <?=$additionalClass ?? ''?>">
    <?php foreach ($menu as $link => $title): ?>
        <li class="<?=functions\isCurrentPage($link) ? 'active' : ''?>"><a href="<?=$link?>"><?=$title?></a></li>
    <?php endforeach;?>
</ul>