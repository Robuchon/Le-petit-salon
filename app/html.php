<?php


// rendu HTML service
function service_html( $service) { 
    $title = $service['titre'] ;
    $temps = $service['temps'];
    $prix = $service['prix'] ;
    $photo = '/img/';
    $photo .= $service['img'];
    $photo .= '.jpg';
    $supplement = $service['supplement'];
    $affichage = nl2br(htmlentities($service['affichage']));
    return 
    <<<HTML
            <article class="card-service">
                <header class="card-header">
                    <div src="" alt="" class="card-avatar"></div>
                    <div class="card-title">$title
                        <div class="card-prix">$temps min, à partir de $prix €</div>
                        <div class="card-prix">$supplement</div>
                    </div>
                </header>
                <div class="card-description-service">
                    <img src="$photo" alt="" class="card-image-service">
                    <p class="com-service">$affichage</p> 
                </div>
                <footer class="card-footer">
                    <a href="/contact" class="footer-question">Question</a>
                    <a href="https://www.planity.com/le-petit-salon-06460-saint-vallier-de-thiey" class="footer-reservation">Réservation</a>
                </footer>
            </article>
    HTML; 
}

// rendu HTML promo et produit
function pro_html(array $produit): string {
    $title = $produit['titre'] ;
    $prix = $produit['prix'] ;
    $reduction = $produit['promo'];
    $photo = '/img/';
    $photo .= $produit['img'];
    $photo .= '.jpg';
    $affichage = nl2br(htmlentities($produit['affichage']));
    $line = '';
    if (!empty($reduction)) {
        $reduction = "<div class='card-prix'>$reduction € </div>";
        $line = '-line';
    }
    return 
    <<<HTML
            <article class="card-service">
                <header class="card-header">
                    <div src="" alt="" class="card-avatar"></div>
                    <div class="card-title">$title
                        <div class="card-prix$line">$prix €</div>
                        $reduction
                    </div>
                </header>
                <div class="card-description-service">
                    <img src="{$photo}" alt="" class="card-image-service">
                    <p class="com-service">$affichage</p> 
                </div>
                <footer class="card-footer">
                    <a href="/contact" class="footer-question">Question</a>
                    <a href="https://www.planity.com/le-petit-salon-06460-saint-vallier-de-thiey" class="footer-reservation">Réservation</a>
                </footer>
            </article>
    HTML;
}

// rendu HTML tableau horraires
function horraire_html () {
    $jour = (int)($_GET['jour'] ?? date('N') - 1);
    $ouvert = in_creneaux($jour);
    foreach(JOURS as $k => $jour) {
    $color = '';
    if ($k + 1 === (int)date('N')) {
        $color = 'green';
        if (!$ouvert) {
            $color = 'red';
        }
    }
    $creneaux = creneaux_html(CRENEAUX[$k]);
    $horraires [] =
    <<<HTML
        <tr class="trb" style="color:$color">
            <td>
                <strong>$jour</strong>
            </td>
            <td>
                $creneaux
            </td>
        </tr>
    HTML;
    unset($color);
    }
    return $horraires;
}

// rendu HTML de la barre du haut avec active si concordance avec URI
function nav_item(string $lien, string $titre): string { 
    $adress = adress();
    $active = '';
    $verif = explode("/", $lien);
    if ($adress[1] === $verif[1]) {
        $active = '-active';
    }
    return <<<HTML
    <a class="nav-link{$active}" href="{$lien}">$titre</a>
    HTML;
}

// rendu HTML de la barre du gauche avec active si concordance avec URI
function nav_item_left (string $lien, string $titre): string {
    $adress = adress();
    $active = '';
    $verif = explode("/", $lien);
    if ($adress[2] === $verif[2]) {
        $active = '-active';
    }
    return <<<HTML
    <a class="nav-link{$active}" href="{$lien}">$titre</a>
    HTML;
}

// generation du HTML de la barre du droite avec active si concordance avec URI
function nav_item_right (string $lien, $titre): string {
    $adress = adress();
    $active = '';
    $verif = explode("/", $lien);
    if ($adress[3] === $verif[3]) {
        $active = '-active';
    }
    return <<<HTML
    <a class="nav-link{$active}" href="{$lien}">$titre</a>
    HTML;
}

// rendu barre de droite
function nav_generate_right () {
    $adress = adress();
    $type = $adress[2];
    $ici = $adress[1];
    $categories = CATEGORIE[$type];
    foreach ($categories as $categorie => $key) {
        $nom = $key[0];
        $rendu [] = nav_item_right("/$ici/$type/$categorie", "$nom");
    }
    return $rendu;
}

// rendu HTML de contact
function contact_html ($erreur = null) {
    if (empty($erreur)) {
        $erreur = ["nom" => '', "prenom" => '', "telephone" => '', "mail" => '', "question" => ''];
    }
    return <<<HTML
    <article class="card-service">
            <header class="card-header">
                <div src="" alt="" class="card-avatar"></div>
                <div class="card-title">Nous contacter
                    <div class="card-prix">Pour toute demande spécifique ou question sur un service ou produit vous pouvez poser votre question ici</div>
                </div>
            </header>
            <form action="" method="post">
                <div class='form-ptext'>
                    <p class="form-edit">Votre Nom</p> <p class='form-erreur'>$erreur[nom]</p>
                    <input type="text" name='nom' placeholder='ex : Dubois'>
                </div>
                <div class='form-ptext'>
                    <p class="form-edit"> et prénom</p> <p class='form-erreur'>$erreur[prenom]</p>
                    <input type="text" name='prenom' placeholder='ex : maxime'>
                </div>
                <div class="form-ptext">
                    <p class="form-edit">Téléphone</p> <p class='form-erreur'>$erreur[telephone]</p>
                    <input type="number" name='telephone' placeholder='ex : 0606060606'>
                </div>
                <div class='form-ptext'>
                    <p class="form-edit">E-mail</p> <p class='form-erreur'>$erreur[mail]</p>
                    <input type="text" name='mail' placeholder='ex : dubois.maxime@mail.fr'>
                </div>
                <div class='form-gtext'>
                    <p class="form-edit">Votre demande</p> <p class='form-erreur'>$erreur[question]</p> <br>
                    <textarea name="question" id="" cols="" rows="4"></textarea>
                </div>   
                <button class="btn">Envoyer</button>
            </form>
            <footer class="card-footer">
                <a href="#" class="footer-question">0492600907</a>
                <a href="https://www.planity.com/le-petit-salon-06460-saint-vallier-de-thiey" class="footer-reservation">Réservation</a>
            </footer>
    </article>
    HTML;
}
