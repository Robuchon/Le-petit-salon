<body>
    <header class="topbar">
        <a href="/accueil" class="topbar-logo">Le Petit Salon</a>
        <nav class="topbar-nav">
            <?= nav_item('/accueil', 'Accueil'); ?>
            <?= nav_item('/savoir-plus', 'En savoir plus'); ?>
            <?= nav_item('/gallerie', 'Gallerie'); ?>
            <?= nav_item('/contact', 'Contact'); ?>           
        </nav>
    </header>
    <div class="container">
    <?=$pageMain ?>
    <?=$pageMain1 ?>
</body>
</html>
