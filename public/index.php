<?php
$pathway = __DIR__;
require "$pathway/../vendor/autoload.php";
require "$pathway/../app/function.php";
require "$pathway/../app/db.php";
require "$pathway/../elements/config.php";
$adress = adress();
$pageMain1 = '';
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

ob_start();
path($pathway, $adress[1]);
$pageMain = ob_get_clean();


if ($adress[1] === '' || $adress[1] === 'accueil' || $adress[1] === 'admin' ) {
    ob_start();
        if (empty($adress[2])) {
            $adress[2] = 'service';      
        }  
    subpath($pathway, $adress[1], $adress[2]);
    $pageMain1 = ob_get_clean();
}
require "$pathway/../elements/layout.php";