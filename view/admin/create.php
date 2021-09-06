<?php
$adress = adress();
$erreurform = '';
if (isset($_POST['titre']) && $adress[2] === 'create') {
    if (!array_search(!'', validateur($_POST), $strict = true)) {
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
