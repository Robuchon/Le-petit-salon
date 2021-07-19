<?php
$uri = $_SERVER['REQUEST_URI'];
?>
    <nav class="sidebar">
        <?= nav_item_side('/accueil/service', 'Service', $uri); ?>
        <?= nav_item_side('/accueil/book', 'Book', $uri); ?>
        <?= nav_item_side('/accueil/promo', 'Promotion', $uri); ?>
        <?= nav_item_side('/accueil/produit', 'Produit', $uri); ?>
    </nav>