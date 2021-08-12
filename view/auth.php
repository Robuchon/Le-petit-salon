<?php
if (auth($_POST) !== 1){
    $erreurs = auth($_POST);
}
?>
<?=connexion_html($erreurs)?>