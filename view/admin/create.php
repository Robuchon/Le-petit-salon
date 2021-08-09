<?php if (empty($_POST['type'])):?>
    <?=type_html();?>
<?php endif;?>
<?php if (isset($_POST['type'])):?>
    <?=create_html($_POST['type'], $erreurform);?>
<?php endif;?>
