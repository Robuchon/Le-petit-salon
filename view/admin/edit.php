<?php 
$erreurform = '';
if (isset($_POST['titre'])) {
    if (!array_search(!null, validateur($_POST))) {
        serviceEdit($_POST);
    }
    if (array_search(!null, validateur($_POST))) {
        $erreurform = validateur($_POST);
    }
}
$data = targetEdit();
?>
    <?=edit_html($erreurform);?>   
    <?=service_html($data);?>
    <?=suppr_html($data);?>
    
</main>