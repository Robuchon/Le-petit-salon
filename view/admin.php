<nav class="sidebar">
<?= nav_item_left('/admin/service', 'Service'); ?>
<?= nav_item_left('/admin/produit', 'Produit'); ?>
<?= nav_item_left('/admin/promo', 'Promotion'); ?>
<?= nav_item_left('/admin/create', 'création'); ?>
<?php if (connexion()): ?>
<?= nav_item_left('/admin/deco', 'Déconnexion'); ?>
<?php endif ?>
</nav>