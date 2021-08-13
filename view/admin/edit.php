<?php 
$erreurform = '';
if (isset($_POST['titre'])) {
    if (isset($_FILES['img'])) {
        $_POST['img'] = $_FILES['img'];
    }
    if (!array_search(!null, validateur($_POST))) {
        serviceEdit($_POST, $_FILES, $pathway);
    }
}

$data = targetEdit();
?>
    <?=edit_html();?>   
    <?=card_html($data);?>
    <?=suppr_html($data);?>
    
</main>
<?php dump($erreurform);