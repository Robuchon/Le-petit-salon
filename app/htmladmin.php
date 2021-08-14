<?php

// rendu HTML pour la connexion
function connexion_html ($erreur = null) {
    $usererreur = '';
    $passerreur = '';
    if (isset($erreur['username'])) {
        $usererreur = $erreur['username'];
    }
    if (isset($erreur['password'])) {
        $passerreur = $erreur['password'];
    }
    return
    <<<HTML
        <main class="main">
            <article class="card-form">
                <form action="" method="post">
                    <div class='form-ligne'>
                        <p>page de connexion</p>    
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">Nom d'utilisateur</p> <p class='form-erreur'>$usererreur</p>
                        <input type="text" name="username">
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">Mot de passe</p> <p class='form-erreur'>$passerreur</p>
                        <input type="password" name="password">
                    </div>
                    <button class='btn' type="submit">Connexion</button>
                </form>
            </article> 
        </main>  
    HTML;
}

// rendu HTML formulaire service admin
function html_service ($type, $erreur = null, $data = null) 
    {if (empty($erreur)) {
        $erreur = ["type" => '', "titre" => '', "categorie" => '', "temps" => '', "prix" => '', "supplement" => '', "img" => '', "affichage" => ''];
    }
    $titre = '';
    if (isset($data['titre'])) {
        $titre = $data['titre'];
    }
    $categorie = '';
    if (isset($data['categorie'])) {
        $categorie = $data['categorie'];
    }
    $temps = '';
    if (isset($data['temps'])) {
        $temps = $data['temps'];
    }
    $prix = '';
    if (isset($data['prix'])) {
        $prix = $data['prix'];
    }
    $supplement = '';
    if (isset($data['supplement'])) {
        $supplement = $data['supplement'];
    }
    $affichage = '';
    if (isset($data['affichage'])) {
        $affichage = $data['affichage'];
    }
    $img = '';
    if (isset($data['img'])) {
        $img = $data['img'];
    }
    return
    <<<HTML
        <main class="main">
            <article class="card-form">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class='form-ligne'>
                        <p class="form-edit">Type</p> <p class='form-erreur'>$erreur[type]</p>
                        <input type="text"  name='type' readonly="readonly" placeholder="$type" value="$type">
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">Titre</p> <p class='form-erreur'>$erreur[titre]</p>
                        <input type="text" name='titre' placeholder='Titre' value="$titre">
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">Categorie</p> <p class='form-erreur'>$erreur[categorie]</p>
                        <input type="text" name='categorie' placeholder='cathegorie de service' value="$categorie">
                    </div>
                    <div class="form-ptext">
                        <p class="form-edit">Temps</p> <p class='form-erreur'>$erreur[temps]</p>
                        <input type="number" name='temps' placeholder='ex : 30' value="$temps">
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">Prix</p> <p class='form-erreur'>$erreur[prix]</p>
                        <input type="text" name='prix' placeholder='ex : 25' value="$prix">
                    </div>
                    <div class='form-ligne'>
                        <p class="form-edit">Supplement</p> <p class='form-erreur'>$erreur[supplement]</p>
                        <input type="text"  name='supplement' placeholder='Supplement' value="$supplement">
                    </div>
                    <div class='form-ligne'>
                        <p class="form-edit">Img</p> <p class='form-erreur'>$erreur[img]</p>
                        <label class="custom-file-upload">
                            <input type="file" name='img' value="$img">
                        </label>
                    </div>
                    <div class='form-gtext'>
                        <p class="form-edit">Déscription</p> <p class='form-erreur'>$erreur[affichage]</p>
                        <textarea name="affichage" id="" cols="" rows="4">$affichage</textarea>
                    </div>    
                    <button class="btn">Créer</button>
                </form>
            </article>
    HTML;
}

// rendu HTML formulaire produit admin
function html_produit ($type, $erreur = null, $data = null) {
    if (empty($erreur)) {
        $erreur = ["type" => '', "titre" => '', "categorie" => '', "promo" => '', "prix" => '', "enstock" => '', "img" => '', "affichage" => ''];
    }
    $selectedoui = '';
    $selectednon = '';
    $titre = '';
    if (isset($data['titre'])) {
        $titre = $data['titre'];
    }
    $categorie = '';
    if (isset($data['categorie'])) {
        $categorie = $data['categorie'];
    }
    $promo = '';
    if (isset($data['promo'])) {
        $promo = $data['promo'];
    }
    $prix = '';
    if (isset($data['prix'])) {
        $prix = $data['prix'];
    }
    if (isset($data['enstock'])) {
        $select = $data['enstock'];
        if ($select === 'oui') {
            $selectedoui = 'selected';
        } else {
            $selectednon = 'selected';
        }
    }
    $affichage = '';
    if (isset($data['affichage'])) {
        $affichage = $data['affichage'];
    }
    $img = '';
    if (isset($data['img'])) {
        $img = $data['img'];
    }
    return
    <<<HTML
        <main class="main">
            <article class="card-form">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class='form-ligne'>
                        <p class="form-edit">Type</p> <p class='form-erreur'>$erreur[type]</p>
                        <input type="text"  name='type' readonly="readonly" placeholder="$type" value="$type">
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">Titre</p> <p class='form-erreur'>$erreur[titre]</p>
                        <input type="text" name='titre' placeholder='Titre' value="$titre">
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">Categorie</p> <p class='form-erreur'>$erreur[categorie]</p>
                        <input type="text" name='categorie' placeholder='cathegorie de produit' value="$categorie">
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">Prix</p> <p class='form-erreur'>$erreur[prix]</p>
                        <input type="number" name='prix' placeholder='ex : 25' value="$prix">
                    </div>
                    <div class="form-ptext">
                        <p class="form-edit">Promotion</p> <p class='form-erreur'>$erreur[promo]</p>
                        <input type="number" name='promo' placeholder='ex : 30' value="$promo">
                    </div>
                    <div class='form-gtext'>
                        <p class="form-edit">Déscription</p> <p class='form-erreur'>$erreur[affichage]</p>
                        <textarea name="affichage" id="" cols="" rows="4">$affichage</textarea>
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">Img</p> <p class='form-erreur'>$erreur[img]</p>
                        <label class="custom-file-upload">
                            <input type="file" name='img' value="$img">
                        </label>
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">En stock</p> <p class='form-erreur'>$erreur[enstock]</p>
                        <br>
                        <label class="custom-file-upload">
                        <select name="enstock">
                            <option value="oui" $selectedoui>oui</option>
                            <option value="non" $selectednon>non</option>
                        </select>
                        </label>
                    </div>
                    <button class="btn">Créer</button>
                </form>
            </article>
    HTML;
}

// rendu HTML formulaire type admin
function type_html () {
    return
    <<<HTML
        <main class="main">
            <article class="card-form">
                <form action="" method="post">
                    <div class='form-gtext'>
                        <p class="form-edit">Choix du type</p><br>
                        <select name="type" id="type-select">
                            <option value="service">Service</option>
                            <option value="produit">Produit</option>
                        </select>  
                        <button class="btn">valider</button>
                    </div>     
                </form>
            </article> 
        </main>   
    HTML; 
}

// rendu HTML suppression admin
function suppr_html ($data) {
    $uri = adress();
    $type = $uri[3];
    $key = $data['key'];
    return
    <<<HTML
        <form action="/admin/suppr/$type" method="post">
            <input type="hidden"  name='type' readonly="readonly" value="$type">
            <input type="hidden"  name='key' readonly="readonly" value="$key">
            <button class='btn'>Supprimer</button>
        </form>
    HTML;
}

// rendu HTML validation suppression admin
function val_Suppr_html ($data) {
    $type = $data['type'];
    $key = $data['key'];
    return
    <<<HTML
        <form action="/admin/suppr" method="post">
            <input type="hidden"  name='type' readonly="readonly" value="$type">
            <input type="hidden"  name='key' readonly="readonly" value="$key">
            <input type="hidden"  name='validation' readonly="readonly" value="val">
            <button class='btn'>Supprimer</button>
        </form>
    HTML;
}