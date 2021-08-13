<main class="main">
        <?php foreach(targetPromoAdmin() as $promo): ?>
            <li><a class="nav-link" href="/admin/edit/produit/<?=$promo['key']?>"><?=$promo['titre']?></a></li>
        <?php endforeach; ?>
    </main>