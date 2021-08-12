<?php
$pathway =__DIR__;
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
if (isset($_POST) && auth($_POST) === 1 ) {
    session_start();
    $_SESSION['connecte'] = auth($_POST);
}
if ($adress[1] === 'admin' && connexion() === false) {
    pageAdmin();
}
if ($adress[1] === 'auth' && connexion() === true) {
    header ('Location: /admin');
    exit;
}
$erreurform = '';
if (isset($_POST['titre']) && $adress[2] === 'create') {
    $_POST['img'] = $_FILES['img'];
    if (!array_search(!null, validateur($_POST))) {
        $type = $_POST['type'];
        serviceCreate($_POST, $_FILES, $pathway);
    }
}
if (isset($_POST['validation'])) {
    if ($_POST['validation'] === 'val') {
        serviceDelete($_POST, $pathway);
    }
}
if ($adress[2] === 'deco') {
    session_start();
    unset($_SESSION['connecte']);
    header('Location: /admin');
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