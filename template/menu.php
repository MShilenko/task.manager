<ul class="main-menu <?=$additionalClass ?? ''?>">
    <?php foreach ($menuItems as $item): ?>
        <?php if (!$item['hide']): ?>
            <li class="<?= functions\isCurrentPage($item['path']) ? 'active' : '' ?>"><a href="<?= $item['path'] ?>"><?= functions\trimTitle($item['title']) ?></a></li>
        <?php endif;?>
    <?php endforeach;?>
</ul>