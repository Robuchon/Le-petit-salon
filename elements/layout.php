<?php
require_once '../app/function.php';
?>

<body>
    <header class="topbar">
        <a href="accueil" class="topbar-logo">Le Petit Salon</a>
        <nav class="topbar-nav">
            <?= nav_item('/accueil', 'Accueil', $adress[1]); ?>
            <?= nav_item('/savoir-plus', 'En savoir plus', $adress[1]); ?>
            <?= nav_item('/gallerie', 'Gallerie', $adress[1]); ?>
            <?= nav_item('/contact', 'Contact', $adress[1]); ?>           
        </nav>
    </header>
    <div class="container">
    <p>Bonjour</p>
    <?=$pageMain ?>
    <?=$pageMain1 ?>
</body>
</html>