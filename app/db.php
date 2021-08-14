<?php

// reucperation de la base de donné
function getPDO (): PDO {
    return new PDO("sqlite:../app/lepetitsalon.db", null, null, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
}

// pour le moment pas utilisé mais sert a rejouté des atribut
// comme comment la base de donné est enregistré dans la variable
function setPDO ($pdo) {
    return $pdo->setAttribute();
}

// recuperation d'un tableau des données distinct d'une colone 
function select ($pdo, $column): array { 
$query = $pdo->query("SELECT DISTINCT $column FROM service");
return $query->fetchALL();
}

// recuperation d'un tableau des categorie distinct
function matchCategorie ($type): array {
    $pdo = getPDO();
    $query = $pdo->query("SELECT DISTINCT $type FROM categorie");
    return $query->fetchALL();
}

// recuperation d'un tableau pour l'affichage des services par categorie
function targetService (): array { 
    $pdo = getPDO();
    $valeur = targetValeur();
    $query = $pdo->query("SELECT * FROM service WHERE categorie='$valeur'");
    return $query->fetchALL();
    }

// recuperation d'un tableau pour l'affichage des produits par stock
function targetProduit (): array { 
    $pdo = getPDO();
    $query = $pdo->query("SELECT * FROM produit WHERE enstock='oui'");
    return $query->fetchALL();
    }

// recuperation d'un tableau pour l'affichage des produits par promo et stock
function targetPromo (): array { 
    $pdo = getPDO();
    $query = $pdo->query("SELECT * FROM produit WHERE promo != '' AND enstock='oui'");
    return $query->fetchALL();
    }

// recuperation d'un tableau pour l'affichage admin des produits
function targetProduitAdmin (): array { 
    $pdo = getPDO();
    $query = $pdo->query("SELECT * FROM produit");
    return $query->fetchALL();
    }

// recuperation d'un tableau pour l'affichage admin des produits par promo
function targetPromoAdmin (): array { 
    $pdo = getPDO();
    $query = $pdo->query("SELECT * FROM produit WHERE promo != ''");
    return $query->fetchALL();
    }

// recuperation d'un tableau de la dernier création ou edition pour le re-affichage
function targetEdit ($key = null) {
    $pdo = getPDO();
    $uri = adress();
    if (is_null($key)) {  
        if (!empty($uri[4])){
            $key = $uri[4];
        }
        if (empty($uri[4])){
            $key = $pdo->lastInsertId();
        }
    }
    $valeur = $uri[3];
    $query = $pdo->query("SELECT * FROM $valeur WHERE key='$key'");
    return $query->fetch();
}

// requete PDO pour l'edition du BD service ou produit
function edit ($data, $file = null, $pathway) {    
    $pdo = getPDO();
    $uri = adress();
    $valeur = $uri[4];
    $type = $uri[3];
    $img = "$type-$valeur";
    if ($type === 'service') {
        $query = $pdo->prepare("UPDATE $type SET titre = :titre, categorie = :categorie, temps = :temps, prix = :prix, supplement = :supplement, img = :img, affichage = :affichage WHERE key='$valeur' ");
        $query->execute([
            'titre' => $data['titre'],
            'categorie' => $data['categorie'],
            'temps' => $data['temps'],
            'prix' => $data['prix'],
            'supplement' => $data['supplement'],
            'img' => $img,
            'affichage' => $data['affichage']
        ]);
    }
    if ($type === 'produit') {
        $produits = 'a faire';
        $query = $pdo->prepare("UPDATE $type SET titre = :titre, categorie = :categorie, promo = :promo, prix = :prix, enstock = :enstock, img = :img, affichage = :affichage WHERE key='$valeur' ");
        $query->execute([
            'titre' => $data['titre'],
            'categorie' => $produits,
            'promo' => $data['promo'],
            'prix' => $data['prix'],
            'enstock' => $data['enstock'],
            'img' => $img,
            'affichage' => $data['affichage']
        ]);
    }
    if(!empty($file)) {
        addImg($file, $img, $pathway);
    }
}

// si une image est posté recup des infos associées et rangement dans le bon dossier
function addImg ($file, $img, $pathway) {
        $imgsource = $file['img'];
        $imgtmpname = $imgsource['tmp_name'];
        move_uploaded_file("$imgtmpname", "$pathway/img/$img.jpg");
}

// création d'une nouvelle ligne dans la BD service ou produit
function serviceCreate ($data, $file = null, $pathway) {    
    $pdo = getPDO();
    $type = $data['type'];
    if ($type === 'service') {
        $query = $pdo->prepare("INSERT INTO $type (titre, categorie, temps, prix, supplement, img, affichage) VALUES (:titre, :categorie, :temps, :prix, :supplement, :img, :affichage)");
        $query->execute([
            'titre' => $data['titre'],
            'categorie' => $data['categorie'],
            'temps' => $data['temps'],
            'prix' => $data['prix'],
            'supplement' => $data['supplement'],
            'affichage' => $data['affichage']
        ]);
    } 
    if ($type === 'produit') {
        $query = $pdo->prepare("INSERT INTO $type (titre, categorie, promo, prix, enstock, img, affichage) VALUES (:titre, :categorie, :promo, :prix, :enstock, :img, :affichage)");
        $query->execute([
            'titre' => $data['titre'],
            'categorie' => $data['categorie'],
            'promo' => $data['promo'],
            'prix' => $data['prix'],
            'enstock' => $data['enstock'],
            'affichage' => $data['affichage']
        ]);
    }   
    $id = $pdo->lastInsertId();
    $img = "$type-$id";
    $query = $pdo->prepare("UPDATE $type SET img = :img WHERE key='$id' ");
    $query->execute([
        'img' => $img
    ]);
    if(!empty($file)) {
        addImg($file, $img, $pathway);
    }
    header("Location: /admin/edit/$type/$id");
    exit();
}

// suppression d'une ligne de la BD
function serviceDelete ($data, $pathway) {
    $pdo = getPDO();
    $type = $data['type'];
    $key = $data['key'];
    $query = $pdo->prepare("DELETE FROM $type WHERE key='$key'");
    $query->execute();
    $img = "$type-$key";
    $file = "$pathway/img/$img.jpg";
    unlink($file);
    header("Location: /admin");
    exit;
}