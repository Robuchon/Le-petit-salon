<?php 
require_once '../view/contenu/service/servicedata.php';
$uri = $_SERVER['REQUEST_URI'];
$adress = explode("/", $uri);
$services = 'BRUSHING';
if (!empty($adress[3])) {
    $services = strtoupper($adress[3]);}
?>
    <main class="main">
    <?php foreach(constant($services) as $service): ?>
        <article class="card-service">
            <header class="card-header">
                <div src="" alt="" class="card-avatar"></div>
                <?= service_html($service) ?>
            <footer class="card-footer">
                <a href="#" class="footer-question">Question</a>
                <a href="#" class="footer-reservation">Réservation</a>
            </footer>
        </article>
    <?php endforeach; ?>        
    </main>
    <aside class="aside">
        <nav class="asidebar">
            <?= nav_item_side('/accueil/service/brushing', 'Brushing Femme', $uri); ?>
            <?= nav_item_side('/accueil/service/coupe', 'Coupes Brushing Femme', $uri); ?>
            <?= nav_item_side('/accueil/service/coloration', 'Coloration Femme', $uri); ?>
            <?= nav_item_side('/accueil/service/meche', 'Mèches - Balayage', $uri); ?>
            <?= nav_item_side('/accueil/service/soin', 'Soins Profond', $uri); ?>         
            <?= nav_item_side('/accueil/service/homme', 'Hommes', $uri); ?>         
            <?= nav_item_side('/accueil/service/enfant', 'Enfants', $uri); ?>         
            <?= nav_item_side('/accueil/service/evenementiel', 'Evénementiel', $uri); ?>         
            <?= nav_item_side('/accueil/service/specal', 'Prestations spécifiques', $uri); ?>         
            <?= nav_item_side('/accueil/service/forfait', 'Forfait', $uri); ?>         
            <?= nav_item_side('/accueil/service/ongle', 'Beauté des Ongles', $uri); ?>         
        </nav>
    </aside>
</div>