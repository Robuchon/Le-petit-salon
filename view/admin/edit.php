<?php 
$uri = adress();
if (isset($_POST['titre'])) {
    serviceEdit($_POST);
}

$service = targetEdit();
$titre = $service['titre'];
$services = $service['services'];
$temps = $service['temps'];
$prix = $service['prix'] ;
$img = $service['img'];
$supplement = $service['supplement'];
$affichage = $service['affichage'];

?>
<main class="main">
    <article class="card-form">
        <form action="" method="post">
            <div class='form-ptext'>
                <p class="form-edit">Titre</p>
                <input type="text" name='titre' value='<?=$titre?>'>
            </div>
            <div class='form-ptext'>
                <p class="form-edit">Services</p>
                <input type="text" name='services' value='<?=$services?>'>
            </div>
            <div class="form-ptext">
                <p class="form-edit">Temps</p>
                <input type="text" name='temps' value='<?=$temps?>'>
            </div>
            <div class='form-ptext'>
                <p class="form-edit">Prix</p>
                <input type="text" name='prix' value='<?=$prix?>'>
            </div>
            <div class='form-ligne'>
                <p class="form-edit">Supplement</p>
                <input type="text"  name='supplement' value='<?=$supplement?>'>
            </div>
            <div class='form-gtext'>
                <p class="form-edit">Img</p>
                <textarea name="img" id="" cols="" rows="4"><?=$img?></textarea>
            </div>
            <div class='form-gtext'>
                <p class="form-edit">Déscription</p>
                <textarea name="affichage" id="" cols="" rows="4"><?=$affichage?></textarea>
            </div>    
            <button class="btn">Editer</button>
        </form>
    </article> 
    <?=service_html(targetEdit());?>
</main>
