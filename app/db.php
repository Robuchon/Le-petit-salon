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

function targetPromo (): array { 
    $pdo = getPDO();
    $query = $pdo->query("SELECT * FROM produit WHERE promo = !null");
    return $query->fetchALL();
    }

function targetEdit ($valeur = null) {
    $pdo = getPDO();
    $uri = adress();
    if (is_null($valeur)) {
        if (!empty($uri[4])){
            $valeur = $uri[4];
        }
        if (empty($uri[4])){
            $valeur = $pdo->lastInsertId();
        }
    }
    $query = $pdo->query("SELECT * FROM service WHERE key='$valeur'");
    return $query->fetch();
}

function serviceEdit ($data) {    
    $pdo = getPDO();
    $uri = adress();
    $valeur = $uri[4];
    $type = $uri[3];
    $query = $pdo->prepare("UPDATE $type SET titre = :titre, services = :services, temps = :temps, prix = :prix, supplement = :supplement, img = :img, affichage = :affichage WHERE key='$valeur' ");
    $query->execute([
        'titre' => $data['titre'],
        'services' => $data['services'],
        'temps' => $data['temps'],
        'prix' => $data['prix'],
        'supplement' => $data['supplement'],
        'img' => $data['img'],
        'affichage' => $data['affichage']
    ]);
}

function serviceCreate ($data) {    
    $pdo = getPDO();
    $type = $data['type'];
    $query = $pdo->prepare("INSERT INTO $type (titre, services, temps, prix, supplement, img, affichage) VALUES (:titre, :services, :temps, :prix, :supplement, :img, :affichage)");
    $query->execute([
        'titre' => $data['titre'],
        'services' => $data['services'],
        'temps' => $data['temps'],
        'prix' => $data['prix'],
        'supplement' => $data['supplement'],
        'img' => $data['img'],
        'affichage' => $data['affichage']
    ]);
    $id = $pdo->lastInsertId();
    header("location: /admin/edit/$type/$id");
    exit();
}

function serviceDelete ($data) {
    $pdo = getPDO();
    $type = $data['type'];
    $key = $data['key'];
    $query = $pdo->prepare("DELETE FROM $type WHERE key='$key'");
    $query->execute();
    header("location: /admin");
}