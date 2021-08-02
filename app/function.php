<?php 
function adress() {
    $uri = $_SERVER['REQUEST_URI'];
    $adress = explode("/", $uri);
    if (empty($adress[1])) {
        $adress[1] = 'accueil';
    }
    if (empty($adress[2])) {
        $adress[2] = 'service';
    }
    if (empty($adress[3])) {
        $adress[3] = 'brushing';
    }
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