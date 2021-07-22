<?php 
require_once '../view/contenu/service/produitdata.php';
$uri = $_SERVER['REQUEST_URI'];
$adress = explode("/", $uri);
?>
    <main class="main">
    <?php foreach(PRODUIT as $service): ?>
        <article class="card-service">
            <header class="card-header">
                <div src="" alt="" class="card-avatar"></div>
                <?= produit_html($service) ?>
            <footer class="card-footer">
                <a href="#" class="footer-question">Question</a>
                <a href="#" class="footer-reservation">Réservation</a>
            </footer>
        </article>
    <?php endforeach; ?>        
    </main>