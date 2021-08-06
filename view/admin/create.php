<?php
$erreurform = '';
if (isset($_POST['titre'])) {
    if (!array_search(!null, validateur($_POST))) {
        $type = $_POST['type'];
        serviceCreate($_POST);
    }
    if (array_search(!null, validateur($_POST))) {
        $erreurform = validateur($_POST);
    }
}

?>
<?php if (empty($_POST['type'])):?>
    <?=type_html();?>
<?php endif;?>
<?php if (isset($_POST['type'])):?>
    <?=create_html($_POST['type'], $erreurform);?>
<?php endif;?>
