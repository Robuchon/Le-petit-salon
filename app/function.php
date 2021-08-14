<?php 

// fonction pour mon systeme de route avec une route par defaut
function adress() {
    $uri = $_SERVER['REQUEST_URI'];
    $adress = explode("/", $uri);
    if (empty($adress[1])) {
        $adress[1] = 'accueil';
    }
    if (empty($adress[2])) {
        $adress[2] = 'service';
    }
    if (empty($adress[3])) {
        $adress[3] = 'brushing';
    }
    return $adress;
}

// recuperation d'une valeur pour trouvé une categorie
function targetValeur () {
    $adress = adress();
    $services = 'brushing';
    if ($adress[1] === 'accueil') {
        $services = 'brushing';
    } 
    if (array_key_exists(2, $adress) && $adress[2] != 'service') {
        $services = $adress[2];
    } 
    if (array_key_exists(3, $adress)) {
        $services = $adress[3];
    }
    return $services;
}

// chemin pour la premier zone d'affichage
function path (string $pathway, string $adress) {
    $filename = "$pathway/../view/$adress.php";
    if (file_exists($filename)) {
        return (require $filename);
    } else { return (require "$pathway/../view/accueil.php");
    }
}

// chemin pour la deuxieme zone d'affichage
function subpath (string $pathway, string $adress, string $subadress) {
    $filename = "$pathway/../view/$adress/$subadress.php";
    if (file_exists($filename)) {
        return (require $filename);
    } else { return (require "$pathway/../view/accueil/service.php");
    }
}

// retour du HTML qui fait les plages horraires d'ouvertures
function creneaux_html (array $creneaux) {
    if (empty($creneaux)) {
        return 'Fermé';
    }
    foreach ($creneaux as $creneau) {
        $phrases = " <strong>0{$creneau[0]}:00</strong> à <strong>{$creneau[1]}:00</strong>";
    }
    return $phrases;
}

// retour d'un bool pour savoir si on est dans le creneau
function in_creneaux ($jour): BOOL {
    $heure = (int)($_GET['heure'] ?? date('G'));
    $creneaux = CRENEAUX[$jour];
    foreach ($creneaux as $creneau) {
        if ($heure >= $creneau[0] && $heure < $creneau[1]) {
            return true;
        }
    }
    return false;
}

// aiguillage pour le rendu HTML coté visiteur
function card_html ($data) {
    $uri = adress();
    if ($uri[3] === 'service') {
        return service_html($data);
    }
    if ($uri[3] === 'produit') {
        return pro_html($data);
    }
}

// aiguillage pour le rendu HTML coté admin creation
function create_html($type, $erreur = null) {
    if ($type === 'service') {
        return html_service($type, $erreur);
    }
    if ($type === 'produit') {
        return html_produit($type, $erreur);
    } 
}

// aiguillage pour le rendu HTML coté admin edition
function edit_html($erreur = null) {
    $uri = adress();
    $type = $uri[3];
    $data = targetEdit();
    if (!isset($data['type'])) {
          $data['type'] = $type;
    }
    if ($type === 'service') {
        return html_service($type, $erreur, $data);
    }
    if ($type === 'produit') {
        return html_produit($type, $erreur, $data);
    }
}

// preparation du mais avec envoi
function mailPreparation ($data) {
    $nom = $data['nom'];
    $prenom = $data['prenom'];
    $telephone = $data['telephone'];
    $mail = $data['mail'];
    $question = $data['question'];
    $header = "FROM: $mail";
    $message = 
"   Ce message vous a etez envoyé par $nom, $prenom.
Contactable pas mail a l'adresse $mail ou par telephone au $telephone.
voici ça question :
'$question'";
    mail('robuchon.hugues@', "contact de $nom, $prenom", $message, $header);
}