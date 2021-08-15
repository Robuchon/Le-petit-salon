    <main class="main">
        <?php foreach(targetProduit() as $produit): ?>
            <?= pro_html($produit) ?>
        <?php endforeach; ?>      
    </main>
    <aside class="aside">
        <nav class="asidebar">
            <?php foreach(nav_generate_right() as $lien):?>
                <?=$lien?>
            <?php endforeach;?>
        </nav>
    </aside>