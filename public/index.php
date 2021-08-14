<?php
$pathway =__DIR__;
date_default_timezone_set('Europe/Paris');
require "$pathway/../elements/config.php";
require "$pathway/../vendor/autoload.php";
require "$pathway/../app/function.php";
require "$pathway/../app/db.php";
require "$pathway/../app/htmladmin.php";
require "$pathway/../app/html.php";
require "$pathway/../app/validateur.php";
require "$pathway/../app/auth.php";
$adress = adress();
$pageMain1 = '';
$erreurs = '';

// verification d'une connexion
// enregistrement dans la SESSION si connexion
if (isset($_POST) && auth($_POST) === 1 ) {
    session_start();
    $_SESSION['connecte'] = auth($_POST);
}

// si on cherche a aller sur les pages admin
// verification d'une connesion avec redirection si besoin
if ($adress[1] === 'admin' && !connexion()) {
    pageAdmin();
}
if ($adress[1] === 'auth' && connexion()) {
    pageAdmin();
}
// une fois un formulaire de création envoyé verification que pas d'erreure
// si pas d'erreure on crée une entrée dans la base de donnée
if (isset($_POST['titre']) && $adress[2] === 'create') {
    $_POST['img'] = $_FILES['img'];
    if (!array_search(!null, validateur($_POST))) {
        serviceCreate($_POST, $_FILES, $pathway);
    }
}

// quand le formulaire de suppression est posté
if (isset($_POST['validation'])) {
    if ($_POST['validation'] === 'val') {
        serviceDelete($_POST, $pathway);
    }
}

// quand le formulaire de deconnexion est posté
if ($adress[2] === 'deco') {
    session_start();
    unset($_SESSION['connecte']);
    header('Location: /admin');
}

if (isset($_POST['mail'])) {
    mailPreparation($_POST);
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le petit salon</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="<?php $pathway?>/app.css">
</head>

<?php

// recuperation de la premier partie de l'affichage dans une varriable
ob_start();
path($pathway, $adress[1]);
$pageMain = ob_get_clean();

// recuperation de la deuxieme partie de l'affichage dans une varriable
if ($adress[1] === '' || $adress[1] === 'accueil' || $adress[1] === 'admin' ) {
    ob_start();
        if (empty($adress[2])) {
            $adress[2] = 'service';      
        }  
    subpath($pathway, $adress[1], $adress[2]);
    $pageMain1 = ob_get_clean();
}

require "$pathway/../elements/layout.php";