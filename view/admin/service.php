    <main class="main">
        <?php foreach(targetService() as $service): ?>
            <li><a class="nav-link" href="/admin/edit/service/<?=$service['key']?>"><?=$service['titre']?></a></li>
        <?php endforeach; ?>
    </main>
  
  <aside class="aside">
        <nav class="asidebar">
            <?php foreach(nav_generate_right() as $lien):?>
                <?=$lien?>
            <?php endforeach;?>         
        </nav>
    </aside>
</div>