<?php
$erreurs = [];
if (!empty($_POST)) {
    if (empty($_POST['username'])) {
        $erreurs['username'] = 'Identifiant vide ou incorrect';
    } 
    if (empty($_POST['password'])) {
        $erreurs['password'] = 'Mot de pass vide ou incorrect';
    }
}
?>




<?=connexion_html($erreurs)?>