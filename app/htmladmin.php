<?php

function connexion_html ($erreur = null) {
    $usererreur = $erreur['username'];
    $passerreur = $erreur['password'];
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
                    <button type="submit">Connexion</button>
                </form>
            </article> 
        </main>  
    HTML;
}

function create_html($type, $erreur = null) {
    if (empty($erreur)) {
        $erreur = ["", "", "", "", "", "", "", ""];
    }
    $service = 
    <<<HTML
        <main class="main">
            <article class="card-form">
                <form action="" method="post">
                    <div class='form-ligne'>
                        <p class="form-edit">Type</p> <p class='form-erreur'>$erreur[0]</p>
                        <input type="text"  name='type' readonly="readonly" placeholder="$type" value="$type">
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">Titre</p> <p class='form-erreur'>$erreur[1]</p>
                        <input type="text" name='titre' placeholder='Titre'>
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">Services</p> <p class='form-erreur'>$erreur[2]</p>
                        <input type="text" name='services' placeholder='cathegorie de service'>
                    </div>
                    <div class="form-ptext">
                        <p class="form-edit">Temps</p> <p class='form-erreur'>$erreur[3]</p>
                        <input type="number" name='temps' placeholder='ex : 30'>
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">Prix</p> <p class='form-erreur'>$erreur[4]</p>
                        <input type="number" name='prix' placeholder='ex : 25'>
                    </div>
                    <div class='form-ligne'>
                        <p class="form-edit">Supplement</p> <p class='form-erreur'>$erreur[5]</p>
                        <input type="text"  name='supplement' placeholder='Supplement'>
                    </div>
                    <div class='form-gtext'>
                        <p class="form-edit">Img</p> <p class='form-erreur'>$erreur[6]</p>
                        <textarea name="img" id="" cols="" rows="4"></textarea>
                    </div>
                    <div class='form-gtext'>
                        <p class="form-edit">Déscription</p> <p class='form-erreur'>$erreur[7]</p>
                        <textarea name="affichage" id="" cols="" rows="4"></textarea>
                    </div>    
                    <button class="btn">Créer</button>
                </form>
            </article> 
        </main>  
    HTML;
    $produit = 
    <<<HTML
        <main class="main">
            <article class="card-form">
                <form action="" method="post">
                    <div class='form-ligne'>
                        <p class="form-edit">Type</p> <p class='form-erreur'>$erreur[0]</p>
                        <input type="text"  name='type' readonly="readonly" placeholder="$type" value="$type">
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">Titre</p> <p class='form-erreur'>$erreur[1]</p>
                        <input type="text" name='titre' placeholder='Titre'>
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">Produit</p> <p class='form-erreur'>$erreur[2]</p>
                        <input type="text" name='produit' placeholder='cathegorie de service'>
                    </div>
                    <div class="form-ptext">
                        <p class="form-edit">Temps</p> <p class='form-erreur'>$erreur[3]</p>
                        <input type="number" name='temps' placeholder='ex : 30'>
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">Prix</p> <p class='form-erreur'>$erreur[4]</p>
                        <input type="number" name='prix' placeholder='ex : 25'>
                    </div>
                    <div class='form-ligne'>
                        <p class="form-edit">Supplement</p> <p class='form-erreur'>$erreur[5]</p>
                        <input type="text"  name='supplement' placeholder='Supplement'>
                    </div>
                    <div class='form-gtext'>
                        <p class="form-edit">Img</p> <p class='form-erreur'>$erreur[6]</p>
                        <textarea name="img" id="" cols="" rows="4"></textarea>
                    </div>
                    <div class='form-gtext'>
                        <p class="form-edit">Déscription</p> <p class='form-erreur'>$erreur[7]</p>
                        <textarea name="affichage" id="" cols="" rows="4"></textarea>
                    </div>    
                    <button class="btn">Créer</button>
                </form>
            </article> 
        </main>  
    HTML;
    if ($type === 'service') {
        $type = $service;
    }
    if ($type === 'produit') {
        $type = $produit;
    }
    return $type; 
}

function edit_html($erreur = null) {
    if (empty($erreur)) {
        $erreur = ["", "", "", "", "", "", "", ""];
    }
    $uri = adress();
    $type = $uri[3];
    $service = targetEdit();
    $titre = $service['titre'];
    $services = $service['services'];
    $temps = $service['temps'];
    $prix = $service['prix'];
    $img = $service['img'];
    $supplement = $service['supplement'];
    $affichage = $service['affichage'];
    $serviceaffichage = 
    <<<HTML
        <main class="main">
            <article class="card-form">
                <form action="" method="post">
                    <div class='form-ligne'>
                        <p class="form-edit">Type</p> <p class='form-erreur'>$erreur[0]</p>
                        <input type="text"  name='type' readonly="readonly" value="$type">
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">Titre</p> <p class='form-erreur'>$erreur[1]</p>
                        <input type="text" name='titre' value="$titre">
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">Services</p> <p class='form-erreur'>$erreur[2]</p>
                        <input type="text" name='services' value="$services">
                    </div>
                    <div class="form-ptext">
                        <p class="form-edit">Temps</p> <p class='form-erreur'>$erreur[3]</p>
                        <input type="number" name='temps' value="$temps">
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">Prix</p> <p class='form-erreur'>$erreur[4]</p>
                        <input type="number" name='prix' value="$prix">
                    </div>
                    <div class='form-ligne'>
                        <p class="form-edit">Supplement</p> <p class='form-erreur'>$erreur[5]</p>
                        <input type="text"  name='supplement' value="$supplement">
                    </div>
                    <div class='form-gtext'>
                        <p class="form-edit">Img</p> <p class='form-erreur'>$erreur[6]</p>
                        <textarea name="img" id="" cols="" rows="4">$img</textarea>
                    </div>
                    <div class='form-gtext'>
                        <p class="form-edit">Déscription</p> <p class='form-erreur'>$erreur[7]</p>
                        <textarea name="affichage" id="" cols="" rows="4">$affichage</textarea>
                    </div>    
                    <button class="btn">Créer</button>
                </form>
            </article> 
    HTML;
    $produitaffichage = 
    <<<HTML
        <main class="main">
            <article class="card-form">
                <form action="" method="post">
                    <div class='form-ligne'>
                        <p class="form-edit">Type</p> <p class='form-erreur'>$erreur[0]</p>
                        <input type="text"  name='type' readonly="readonly" value="$type" value="$type">
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">Titre</p> <p class='form-erreur'>$erreur[1]</p>
                        <input type="text" name='titre' value='$titre'>
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">Servi</p> <p class='form-erreur'>$erreur[2]</p>
                        <input type="text" name='services' value='$services'>
                    </div>
                    <div class="form-ptext">
                        <p class="form-edit">Temps</p> <p class='form-erreur'>$erreur[3]</p>
                        <input type="number" name='temps' value='$temps'>
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">Prix</p> <p class='form-erreur'>$erreur[4]</p>
                        <input type="number" name='prix' value='$prix'>
                    </div>
                    <div class='form-ligne'>
                        <p class="form-edit">Supplement</p> <p class='form-erreur'>$erreur[5]</p>
                        <input type="text"  name='supplement' value='$supplement'>
                    </div>
                    <div class='form-gtext'>
                        <p class="form-edit">Img</p> <p class='form-erreur'>$erreur[6]</p>
                        <textarea name="img" id="" cols="" rows="4">$img</textarea>
                    </div>
                    <div class='form-gtext'>
                        <p class="form-edit">Déscription</p> <p class='form-erreur'>$erreur[7]</p>
                        <textarea name="affichage" id="" cols="" rows="4">$affichage</textarea>
                    </div>    
                    <button class="btn">Créer</button>
                </form>
            </article> 
    HTML;
    if ($type === 'service') {
        $type = $serviceaffichage;
    }
    if ($type === 'produit') {
        $type = $produitaffichage;
    }
    return $type; 
}

function type_html () {
    return
    <<<HTML
        <main class="main">
            <article class="card-form">
                <form action="" method="post">
                    <label for="type-select">Choix du type</label>
                    <select name="type" id="type-select">
                        <option value="service">Service</option>
                        <option value="produit">Produit</option>
                    </select>  
                    <button class="btn">valider</button>     
                </form>
            </article> 
        </main>   
    HTML; 
}

function suppr_html ($data) {
    $uri = adress();
    $type = $uri[3];
    $key = $data['key'];
    return
    <<<HTML
        <form action="/admin/suppr" method="post">
            <input type="hidden"  name='type' readonly="readonly" value="$type">
            <input type="hidden"  name='key' readonly="readonly" value="$key">
            <button>Supprimer</button>
        </form>
    HTML;
}

function val_Suppr_html ($data) {
    $type = $data['type'];
    $key = $data['key'];
    return
    <<<HTML
        <form action="/admin/suppr" method="post">
            <input type="hidden"  name='type' readonly="readonly" value="$type">
            <input type="hidden"  name='key' readonly="readonly" value="$key">
            <input type="hidden"  name='validation' readonly="readonly" value="val">
            <button>Supprimer</button>
        </form>
    HTML;
}