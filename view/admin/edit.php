<?php 
$service = targetEdit();
$titre = $service['titre'];
$temps = $service['temps'];
$prix = $service['prix'] ;
$img = $service['img'];
$supplement = $service['supplement'];
$affichage = $service['affichage'];
if (isset($_POST['titre'])) {
    serviceEdit($_POST);
}
?>

<article class="card-form">
    <form action="" method="post">
        <p>Titre</p>
        <input type="text" class='form-control' name='titre' value='<?=$titre?>'><br>
        <p>Temps</p>
        <input type="text" class='form-control' name='temps' value='<?=$temps?>'><br>
        <p>Prix</p>
        <input type="text" class='form-control' name='prix' value='<?=$prix?>'><br>
        <p>Supplement</p>
        <input type="text" class='form-control' name='supplement' value='<?=$supplement?>'><br>
        <p>Img</p>
        <input type="text" class='form-control' name='img' value='<?=$img?>'><br>
        <p>Affichage</p>
        <input type="text" class='form-control' name='affichage' value='<?=$affichage?>'>
        <button class="btn">Edité</button>
    </form>
    
</article> 

<?=service_html(targetEdit());