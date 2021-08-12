    <main class="main">
        <?php foreach(targetPromo() as $produit): ?>
            <?= pro_html($produit) ?>
        <?php endforeach; ?>      
    </main>