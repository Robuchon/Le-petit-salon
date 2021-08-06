<?php
if (isset($_POST['validation'])) {
    if ($_POST['validation']=== 'val') {
        serviceDelete($_POST);
    }
} 

?>

<?=service_html(targetEdit($_POST['key']));?>
<?=val_Suppr_html($_POST);?>
