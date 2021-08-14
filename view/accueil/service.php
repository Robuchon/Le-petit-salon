    <main class="main">
        <?php foreach(targetService() as $service): ?>
            <?= service_html($service, $pathway) ?>
        <?php endforeach; ?>
    </main>
    <aside class="aside">
        <nav class="asidebar">
            <?php foreach(nav_generate_right() as $lien):?>
                <?=$lien?>
            <?php endforeach;?>
        </nav>
    </aside>
</div>

