<ul class="main-menu <?=$additionalClass ?? ''?>">
    <?php foreach ($menuItems as $item): ?>
        <li class="<?= functions\isCurrentPage($item['path']) ? 'active' : '' ?>"><a href="<?= $item['path'] ?>"><?=functions\trimTitle($item['title'])?></a></li>
    <?php endforeach;?>
</ul>