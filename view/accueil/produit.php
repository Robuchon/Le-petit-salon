    <main class="main">
        <?php foreach(targetProduit() as $produit): ?>
            <?= pro_html($produit) ?>
        <?php endforeach; ?>      
    </main>