<body>
    <header class="topbar">
        <a href="/accueil" class="topbar-logo">Le Petit Salon</a>
        <nav class="topbar-nav">
            <?php foreach(nav_generate_top() as $lien):?>
                <?=$lien?>
            <?php endforeach;?>          
        </nav>
    </header>
    <div class="container">
    <?=$pageMain ?>
    <?=$pageMain1 ?>
</body>
</html>
