<?php

function card_html ($data) {
    $uri = adress();
    if ($uri[3] === 'service') {
        return service_html($data);
    }
    if ($uri[3] === 'produit') {
        return pro_html($data);
    }
}

function service_html( $service) { 
    $title = $service['titre'] ;
    $temps = $service['temps'];
    $prix = $service['prix'] ;
    $photo = '/img/';
    $photo .= $service['img'];
    $photo .= '.jpg';
    $supplement = $service['supplement'];
    $affichage = nl2br(htmlentities($service['affichage']));
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
                    <img src="$photo" alt="" class="card-image-service">
                    <p class="com-service">$affichage</p> 
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
    $photo = '/img/';
    $photo .= $produit['img'];
    $photo .= '.jpg';
    $affichage = nl2br(htmlentities($produit['affichage']));
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
                    <p class="com-service">$affichage</p> 
                </div>
                <footer class="card-footer">
                    <a href="#" class="footer-question">Question</a>
                    <a href="#" class="footer-reservation">Réservation</a>
                </footer>
            </article>
    HTML;
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