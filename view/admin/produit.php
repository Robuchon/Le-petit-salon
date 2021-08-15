    <main class="main">
        <?php foreach(targetProduitAdmin() as $produit): ?>
            <li><a class="nav-link" href="/admin/edit/produit/<?=$produit['key']?>"><?=$produit['titre']?></a></li>
        <?php endforeach; ?>
    </main>
    <aside class="aside">
        <nav class="asidebar">
            <?php foreach(nav_generate_right() as $lien):?>
                <?=$lien?>
            <?php endforeach;?>
        </nav>
    </aside>