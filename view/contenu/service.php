<?php 
require_once '../view/contenu/service/data.php';
?>
    <main class="main">
    <?php foreach(SERVICES as $services): ?>
        <article class="card-service">
            <header class="card-header">
                <div src="" alt="" class="card-avatar"></div>
                <?= service_html($services) ?>
            </header>
            <div class="card-description-service">
                <img src="../img/coif1.jpg" alt="" class="card-image-service">
                <img src="../img/coif2.jpg" alt="" class="card-image-service">
            </div>
            <footer class="card-footer">
                <a href="#" class="footer-question">Question</a>
                <a href="#" class="footer-reservation">Réservation</a>
            </footer>
        </article>
    <?php endforeach; ?>        
    </main>
    <aside class="aside">
        <nav class="asidebar">
            <?= nav_item_side('#', 'Brushing Femme', $uri); ?>
            <?= nav_item_side('#', 'Coupes Brushing Femme', $uri); ?>
            <?= nav_item_side('#', 'Coloration Femme', $uri); ?>
            <?= nav_item_side('#', 'Mèches - Balayage', $uri); ?>
            <?= nav_item_side('#', 'Soins Profond', $uri); ?>         
            <?= nav_item_side('#', 'Hommes', $uri); ?>         
            <?= nav_item_side('#', 'Enfants', $uri); ?>         
            <?= nav_item_side('#', 'Evénementiel', $uri); ?>         
            <?= nav_item_side('#', 'Prestations spécifiques', $uri); ?>         
            <?= nav_item_side('#', 'Forfait', $uri); ?>         
            <?= nav_item_side('#', 'Beauté des Ongles', $uri); ?>         
        </nav>
    </aside>
</div>