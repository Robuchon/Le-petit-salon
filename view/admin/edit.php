<?php 
$erreurform = '';
if (isset($_POST['titre'])) {
    if (isset($_FILES['img'])) {
        $_POST['img'] = $_FILES['img'];
    }
    if (!array_search(!null, validateur($_POST))) {
        serviceEdit($_POST, $_FILES, $pathway);
    }
    if (array_search(!null, validateur($_POST))) {
        $erreurform = validateur($_POST);
    }
    
}

$data = targetEdit();
?>
    <?=edit_html($erreurform);?>   
    <?=card_html($data);?>
    <?=suppr_html($data);?>
    
</main>
