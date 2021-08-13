    <main class="main">
        <?php foreach(targetProduitAdmin() as $produit): ?>
            <li><a class="nav-link" href="/admin/edit/produit/<?=$produit['key']?>"><?=$produit['titre']?></a></li>
        <?php endforeach; ?>
    </main>