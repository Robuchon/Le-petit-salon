<?php
//dd($_POST);
if (isset($_POST['titre'])) {
    $type = $_POST['type'];
    serviceCreate($_POST);
    header("location: /admin/edit/$type");
}

?>

<main class="main">
    <article class="card-form">
        <form action="" method="post">
            <div class='form-ligne'>
                <p class="form-edit">Type</p>
                <input type="text"  name='type' placeholder='service, produit ou promo'>
            </div>
            <div class='form-ptext'>
                <p class="form-edit">Titre</p>
                <input type="text" name='titre' placeholder='Titre'>
            </div>
            <div class='form-ptext'>
                <p class="form-edit">Services</p>
                <input type="text" name='services' placeholder='cathegorie de service'>
            </div>
            <div class="form-ptext">
                <p class="form-edit">Temps</p>
                <input type="text" name='temps' placeholder='ex : 30'>
            </div>
            <div class='form-ptext'>
                <p class="form-edit">Prix</p>
                <input type="text" name='prix' placeholder='ex 25'>
            </div>
            <div class='form-ligne'>
                <p class="form-edit">Supplement</p>
                <input type="text"  name='supplement' placeholder='Supplement'>
            </div>
            <div class='form-gtext'>
                <p class="form-edit">Img</p>
                <textarea name="img" id="" cols="" rows="4"></textarea>
            </div>
            <div class='form-gtext'>
                <p class="form-edit">Déscription</p>
                <textarea name="affichage" id="" cols="" rows="4"></textarea>
            </div>    
            <button class="btn">Créer</button>
        </form>
    </article> 
</main>