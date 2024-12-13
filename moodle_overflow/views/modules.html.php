
<?php foreach ($modules as $module): ?>
    <div class="container">
        <a class="module" href="../controllers/module.php?id=<?=$module['id']?>" >
            <div id='<?=$module['id']?>'>
                <p><?=$module['no_posts']?> Post(s) or Question(s)</p>
                <h3><?=htmlspecialchars($module['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                <p>Teacher: <?=htmlspecialchars($module['teacher'], ENT_QUOTES, 'UTF-8') ?></p>
            </div>
        </a>        
    </div>
    <?php endforeach; ?>
