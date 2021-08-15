<main class="main">
        <?php foreach(targetPromoAdmin() as $promo): ?>
            <li><a class="nav-link" href="/admin/edit/produit/<?=$promo['key']?>"><?=$promo['titre']?></a></li>
        <?php endforeach; ?>
    </main>
    <aside class="aside">
        <nav class="asidebar">
            <?php foreach(nav_generate_right() as $lien):?>
                <?=$lien?>
            <?php endforeach;?>
        </nav>
    </aside>