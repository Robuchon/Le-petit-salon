<?php
$erreurs = '';
if (isset($_POST) && auth($_POST) === 1 ) {
    session_start();
    $_SESSION['connecte'] = auth($_POST);
} else {
    $erreurs = auth($_POST);
}
if (connexion() === true) {
    header('location: /admin');
}
?>
<?=connexion_html($erreurs)?>