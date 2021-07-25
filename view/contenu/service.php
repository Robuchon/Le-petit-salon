    <main class="main">
        <?php foreach(targetBD() as $service): ?>
            <?= service_html($service) ?>
        <?php endforeach; ?>
    </main>
    <aside class="aside">
        <nav class="asidebar">
            <?= nav_item_side('/accueil/service/brushing', 'Brushing Femme'); ?>
            <?= nav_item_side('/accueil/service/coupe', 'Coupes Brushing Femme'); ?>
            <?= nav_item_side('/accueil/service/coloration', 'Coloration Femme'); ?>
            <?= nav_item_side('/accueil/service/meche', 'Mèches - Balayage'); ?>
            <?= nav_item_side('/accueil/service/soin', 'Soins Profond'); ?>         
            <?= nav_item_side('/accueil/service/homme', 'Hommes'); ?>         
            <?= nav_item_side('/accueil/service/enfant', 'Enfants'); ?>         
            <?= nav_item_side('/accueil/service/evenementiel', 'Evénementiel'); ?>         
            <?= nav_item_side('/accueil/service/specal', 'Prestations spécifiques'); ?>         
            <?= nav_item_side('/accueil/service/forfait', 'Forfait'); ?>         
            <?= nav_item_side('/accueil/service/ongle', 'Beauté des Ongles'); ?>         
        </nav>
    </aside>
</div>

<?php //dd(targetBD());