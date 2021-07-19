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