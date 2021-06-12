<?php
require '../vendor/autoload.php';
require '../elements/config.php';
require '../view/contenu/service/data.php';
date_default_timezone_set('Europe/Paris');
$heure = (int)($_GET['heure'] ?? date('G'));
$jour = (int)($_GET['jour'] ?? date('N') - 1);
$creneaux = CRENEAUX[$jour];
$ouvert = in_creneaux($heure, $creneaux);
$color = 'green';
if (!$ouvert) {
    $color = 'red';
}
$pageMain1 = '';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le petit salon</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="../app.css">
</head>

<?php

$uri = $_SERVER['REQUEST_URI'];
$adress = explode("/", $uri);

ob_start();
if ($adress[1] === 'savoir-plus') {
    require '../view/savoir-plus.php';
} elseif ($adress[1] === 'gallerie') {
    require '../view/gallerie.php';
} elseif ($adress[1] === 'contact') {
    require '../view/contact.php';
} else (require '../view/accueil.php');
$pageMain = ob_get_clean();

ob_start();
if ($adress[1] === '' || $adress[1] === 'accueil' ) {
    if (empty($adress[2])) {
        $adress[2] = 'service';
    }
    require '../view/contenu/' . $adress[2] . '.php';
}
$pageMain1 = ob_get_clean();

require '../elements/layout.php';