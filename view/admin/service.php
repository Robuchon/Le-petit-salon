    <main class="main">
        <?php foreach(targetService() as $service): ?>
            <li><a class="nav-link" href="/admin/edit/service/<?=$service['key']?>"><?=$service['titre']?></a></li>
        <?php endforeach; ?>
    </main>
  
  <aside class="aside">
        <nav class="asidebar">
            <?= nav_item_right('/admin/service/brushing', 'Brushing Femme'); ?>
            <?= nav_item_right('/admin/service/coupe', 'Coupes Brushing Femme'); ?>
            <?= nav_item_right('/admin/service/coloration', 'Coloration Femme'); ?>
            <?= nav_item_right('/admin/service/meche', 'Mèches - Balayage'); ?>
            <?= nav_item_right('/admin/service/soin', 'Soins Profond'); ?>         
            <?= nav_item_right('/admin/service/homme', 'Hommes'); ?>         
            <?= nav_item_right('/admin/service/enfant', 'Enfants'); ?>         
            <?= nav_item_right('/admin/service/evenementiel', 'Evénementiel'); ?>         
            <?= nav_item_right('/admin/service/specal', 'Prestations spécifiques'); ?>         
            <?= nav_item_right('/admin/service/forfait', 'Forfait'); ?>         
            <?= nav_item_right('/admin/service/ongle', 'Beauté des Ongles'); ?>         
        </nav>
    </aside>
</div>