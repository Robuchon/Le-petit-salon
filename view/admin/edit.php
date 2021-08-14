<?php 
$erreurform = '';
if (isset($_POST['titre'])) {
    if (isset($_FILES['img'])) {
        $_POST['img'] = $_FILES['img'];
    }
    $erreurform = validateur($_POST);
    if (!array_search(!null, $erreurform)) {
        edit($_POST, $_FILES, $pathway);
    }
}

$data = targetEdit();
?>
    <?=edit_html($erreurform);?>   
    <?=card_html($data);?>
    <?=suppr_html($data);?>  
</main>