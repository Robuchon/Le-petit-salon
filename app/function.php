<?php 
require_once "$pathway/../view/contenu/service/servicedata.php";
require_once "$pathway/../view/contenu/service/produitdata.php";
require_once "$pathway/../view/contenu/service/promodata.php";

function adress() {
    $uri = $_SERVER['REQUEST_URI'];
    $adress = explode("/", $uri);
    return $adress;
}

function targetBD () {
    $adress = adress();
    if ($adress[1] === 'accueil') {
        $services = 'BRUSHING';
    }
    if (array_key_exists(2, $adress) && $adress[2] != 'service') {
        $services = strtoupper($adress[2]);
    }
    if (array_key_exists(3, $adress)) {
        $services = strtoupper($adress[3]);
    }
    return (constant($services));
}

function nav_item(string $lien, string $titre): string { 
    $adress = adress();
    $active = '';
    $verif = '/';
    $verif .= $adress[1];
    if ($verif === $lien) {
        $active = '-active';
    }
    return <<<HTML
    <a class="nav-link{$active}" href="{$lien}">$titre</a>
    HTML;
}

function nav_item_side(string $lien, string $titre): string {
    $uri = $_SERVER['REQUEST_URI'];
    $active = '';
    if ($uri === $lien) {
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

function subpath(string $pathway, string $adress) {
    $filename = "$pathway/../view/contenu/$adress.php";
    if (file_exists($filename)) {
        return (require $filename);
    } else { return (require "$pathway/../view/contenu/service.php");
    }
}

function service_html( $service ) { 
    $title = $service[0] ;
    $temps = $service[1];
    $prix = $service[2] ;
    $photo = $service[3];
    $supplement = $service[4];
    $commentaire = $service[5];
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

function pro_html(array $services): string {
    $title = $services[0] ;
    $prix = $services[1] ;
    $reduction = $services[2];
    $photo = $services[3];
    $commentaire = $services[4];
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