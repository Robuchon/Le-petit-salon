    <main class="main">
        <?php foreach(targetService() as $service): ?>
            <?= service_html($service, $pathway) ?>
        <?php endforeach; ?>
    </main>
    <aside class="aside">
        <nav class="asidebar">
            <?= nav_item_right('/accueil/service/brushing', 'Brushing Femme'); ?>
            <?= nav_item_right('/accueil/service/coupe', 'Coupes Brushing Femme'); ?>
            <?= nav_item_right('/accueil/service/coloration', 'Coloration Femme'); ?>
            <?= nav_item_right('/accueil/service/meche', 'Mèches - Balayage'); ?>
            <?= nav_item_right('/accueil/service/soin', 'Soins Profond'); ?>         
            <?= nav_item_right('/accueil/service/homme', 'Hommes'); ?>         
            <?= nav_item_right('/accueil/service/enfant', 'Enfants'); ?>         
            <?= nav_item_right('/accueil/service/evenementiel', 'Evénementiel'); ?>         
            <?= nav_item_right('/accueil/service/specal', 'Prestations spécifiques'); ?>         
            <?= nav_item_right('/accueil/service/forfait', 'Forfait'); ?>         
            <?= nav_item_right('/accueil/service/ongle', 'Beauté des Ongles'); ?>         
        </nav>
    </aside>
</div>

