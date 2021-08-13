<?php

function getPDO (): PDO {
    return new PDO("sqlite:../app/lepetitsalon.db", null, null, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
}

function setPDO ($pdo) {
    return $pdo->setAttribute();
}

function select ($pdo, $column): array { 
$query = $pdo->query("SELECT DISTINCT $column FROM service");
return $query->fetchALL();
}

function matchService (): array {
    $pdo = getPDO();
    $query = $pdo->query("SELECT DISTINCT services FROM service");
    return $query->fetchALL();
}

function targetService (): array { 
    $pdo = getPDO();
    $valeur = targetValeur();
    $query = $pdo->query("SELECT * FROM service WHERE services='$valeur'");
    return $query->fetchALL();
    }

function targetProduit (): array { 
    $pdo = getPDO();
    $query = $pdo->query("SELECT * FROM produit WHERE enstock='oui'");
    return $query->fetchALL();
    }

function targetProduitAdmin (): array { 
    $pdo = getPDO();
    $query = $pdo->query("SELECT * FROM produit");
    return $query->fetchALL();
    }

function targetPromo (): array { 
    $pdo = getPDO();
    $query = $pdo->query("SELECT * FROM produit WHERE promo != '' AND enstock='oui'");
    return $query->fetchALL();
    }

function targetPromoAdmin (): array { 
    $pdo = getPDO();
    $query = $pdo->query("SELECT * FROM produit WHERE promo != ''");
    return $query->fetchALL();
    }

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

function serviceEdit ($data, $file = null, $pathway) {    
    $pdo = getPDO();
    $uri = adress();
    $valeur = $uri[4];
    $type = $uri[3];
    $img = "$type-$valeur";
    $produits = 'a faire';
    if ($type === 'service') {
        $query = $pdo->prepare("UPDATE $type SET titre = :titre, services = :services, temps = :temps, prix = :prix, supplement = :supplement, img = :img, affichage = :affichage WHERE key='$valeur' ");
        $query->execute([
            'titre' => $data['titre'],
            'services' => $data['services'],
            'temps' => $data['temps'],
            'prix' => $data['prix'],
            'supplement' => $data['supplement'],
            'img' => $img,
            'affichage' => $data['affichage']
        ]);
    }
    if ($type === 'produit') {
        $query = $pdo->prepare("UPDATE $type SET titre = :titre, produits = :produits, promo = :promo, prix = :prix, enstock = :enstock, img = :img, affichage = :affichage WHERE key='$valeur' ");
        $query->execute([
            'titre' => $data['titre'],
            'produits' => $produits,
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

function addImg ($file, $img, $pathway) {
        $imgsource = $file['img'];
        $imgtmpname = $imgsource['tmp_name'];
        move_uploaded_file("$imgtmpname", "$pathway/img/$img.jpg");
}

function serviceCreate ($data, $file = null, $pathway) {    
    $pdo = getPDO();
    $type = $data['type'];
    if ($type === 'service') {
        $query = $pdo->prepare("INSERT INTO $type (titre, services, temps, prix, supplement, img, affichage) VALUES (:titre, :services, :temps, :prix, :supplement, :img, :affichage)");
        $query->execute([
            'titre' => $data['titre'],
            'services' => $data['services'],
            'temps' => $data['temps'],
            'prix' => $data['prix'],
            'supplement' => $data['supplement'],
            'affichage' => $data['affichage']
        ]);
    } 
    if ($type === 'produit') {
        $query = $pdo->prepare("INSERT INTO $type (titre, produits, promo, prix, enstock, img, affichage) VALUES (:titre, :produits, :promo, :prix, :enstock, :img, :affichage)");
        $query->execute([
            'titre' => $data['titre'],
            'produits' => $data['produits'],
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