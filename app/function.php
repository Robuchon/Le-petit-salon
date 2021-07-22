<?php 
function nav_item(string $lien, string $titre, string $adress): string {
    $active = '';
    $verif = '/';
    $verif .= $adress;
    if ($verif === $lien) {
        $active = '-active';
    }
    return <<<HTML
    <a class="nav-link{$active}" href="{$lien}">$titre</a>
    HTML;
}

function nav_item_side(string $lien, string $titre, string $uri): string {
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

function service_html(array $services): string {
    $title = $services[0] ;
    $temps = $services[1];
    $prix = $services[2] ;
    $photo = $services[3];
    $supplement = $services[4];
    $commentaire = $services[5];
    return <<<HTML
    <div class="card-title">$title
        <div class="card-prix">$temps, à partir de $prix €</div>
        <div class="card-prix">$supplement</div>
    </div>
    </header>
            <div class="card-description-service">
                <img src="{$photo}" alt="" class="card-image-service">
                <p class="com-service">$commentaire</p> 
            </div>
    HTML;
}

function produit_html(array $services): string {
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
    return <<<HTML
    <div class="card-title">$title
        <div class="card-prix$line">$prix €</div>
        $reduction
    </div>
    </header>
            <div class="card-description-service">
                <img src="{$photo}" alt="" class="card-image-service">
                <p class="com-service">$commentaire</p> 
            </div>
    HTML;
}

/*
ob_start();
if ($adress[1] === '' || $adress[1] === 'accueil' ) {
    if (empty($adress[2])) {
        $adress[2] = 'service';
    }
    require "$pathway/../view/contenu/" . $adress[2] . ".php";
}
$pageMain1 = ob_get_clean();*/