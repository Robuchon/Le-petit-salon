    <main class="main">
        <?php foreach(targetBD() as $service): ?>
            <?= pro_html($service) ?>
        <?php endforeach; ?>      
    </main>