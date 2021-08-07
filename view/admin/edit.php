<?php 
pageAdmin();
$erreurform = '';
$data = targetEdit();
if(!empty($_FILES)) {
    $img = $_FILES;
    $type = $_POST['type'];
    $key = $data['key'];
    $name = "$type-$key";
    move_uploaded_file($img['tmp_name'], "$pathway/img/$name");
}
if (isset($_POST['titre'])) {
    if (!array_search(!null, validateur($_POST))) {
        serviceEdit($_POST);
    }
    if (array_search(!null, validateur($_POST))) {
        $erreurform = validateur($_POST);
    }
}

dump($data);
?>
    <?=edit_html($erreurform);?>   
    <?=service_html($data);?>
    <?=suppr_html($data);?>
    
</main>