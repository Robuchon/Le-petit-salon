<?php
if (isset($_POST['titre'])) {
    $type = $_POST['type'];
    serviceCreate($_POST);
    header("location: /admin/edit/$type");
}
?>
<?php if (empty($_POST['type'])):?>
    <?=type_html();?>
<?php endif;?>
<?php if (isset($_POST['type'])):?>
    <?=create_html($_POST['type']);?>
<?php endif;?>