<?php 
function adress() {
    $uri = $_SERVER['REQUEST_URI'];
    $adress = explode("/", $uri);
    return $adress;
}

function targetValeur () {
    $adress = adress();
    $services = 'brushing';
    if ($adress[1] === 'accueil') {
        $services = 'brushing';
    } 
    if (array_key_exists(2, $adress) && $adress[2] != 'service') {
        $services = $adress[2];
    } 
    if (array_key_exists(3, $adress)) {
        $services = $adress[3];
    }
    return $services;
}

function nav_item(string $lien, string $titre): string { 
    $adress = adress();
    $active = '';
    $verif = explode("/", $lien);
    if ($adress[1] === $verif[1]) {
        $active = '-active';
    }
    return <<<HTML
    <a class="nav-link{$active}" href="{$lien}">$titre</a>
    HTML;
}

function nav_item_left(string $lien, string $titre): string {
    $adress = adress();
    $active = '';
    $verif = explode("/", $lien);
    if ($adress[2] === $verif[2]) {
        $active = '-active';
    }
    return <<<HTML
    <a class="nav-link{$active}" href="{$lien}">$titre</a>
    HTML;
}

function nav_item_right(string $lien, string $titre): string {
    $adress = adress();
    $active = '';
    $verif = explode("/", $lien);
    if ($adress[3] === $verif[3]) {
        $active = '-active';
    }
    return <<<HTML
    <a class="nav-link{$active}" href="{$lien}">$titre</a>
    HTML;
}

function path(string $pathway, string $adress) {
    $filename = "$pathway/../view/$adress.php";
    if (file_exists($filename)) {
        return (require $filename);
    } else { return (require "$pathway/../view/accueil.php");
    }
}

function subpath(string $pathway, string $adress, string $subadress) {
    $filename = "$pathway/../view/$adress/$subadress.php";
    if (file_exists($filename)) {
        return (require $filename);
    } else { return (require "$pathway/../view/accueil/service.php");
    }
}

function service_html( $service ) { 
    $title = $service['titre'] ;
    $temps = $service['temps'];
    $prix = $service['prix'] ;
    $photo = $service['img'];
    $supplement = $service['supplement'];
    $commentaire = nl2br(htmlentities($service['affichage']));
    return 
    <<<HTML
            <article class="card-service">
                <header class="card-header">
                    <div src="" alt="" class="card-avatar"></div>
                    <div class="card-title">$title
                        <div class="card-prix">$temps, à partir de $prix €</div>
                        <div class="card-prix">$supplement</div>
                    </div>
                </header>
                <div class="card-description-service">
                    <img src="{$photo}" alt="" class="card-image-service">
                    <p class="com-service">$commentaire</p> 
                </div>
                <footer class="card-footer">
                    <a href="#" class="footer-question">Question</a>
                    <a href="#" class="footer-reservation">Réservation</a>
                </footer>
            </article>   
    HTML; 
    }

function pro_html(array $produit): string {
    $title = $produit['titre'] ;
    $prix = $produit['prix'] ;
    $reduction = $produit['promo'];
    $photo = $produit['img'];
    $commentaire = nl2br(htmlentities($produit['description']));
    $line = '';
    if (!empty($reduction)) {
        $reduction = "<div class='card-prix'>$reduction € </div>";
        $line = '-line';
    }
    return 
    <<<HTML
            <article class="card-service">
                <header class="card-header">
                    <div src="" alt="" class="card-avatar"></div>
                    <div class="card-title">$title
                        <div class="card-prix$line">$prix €</div>
                        $reduction
                    </div>
                </header>
                <div class="card-description-service">
                    <img src="{$photo}" alt="" class="card-image-service">
                    <p class="com-service">$commentaire</p> 
                </div>
                <footer class="card-footer">
                    <a href="#" class="footer-question">Question</a>
                    <a href="#" class="footer-reservation">Réservation</a>
                </footer>
            </article>
    HTML;
    }