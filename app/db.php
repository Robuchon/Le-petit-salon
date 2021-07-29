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

function targetEdit (): array {
    $pdo = getPDO();
    $uri = adress();
    $valeur = $uri[3];
    $query = $pdo->query("SELECT * FROM service WHERE key='$valeur'");
    return $query->fetch();
}

function serviceEdit ($data) {    
    $pdo = getPDO();
    $uri = adress();
    $valeur = $uri[3];
    $query = $pdo->prepare("UPDATE service SET titre = :titre, temps = :temps, prix = :prix, supplement = :supplement, img = :img, affichage = :affichage WHERE key='$valeur' ");
    $query->execute([
        'titre' => $data['titre'],
        'temps' => $data['temps'],
        'prix' => $data['prix'],
        'supplement' => $data['supplement'],
        'img' => $data['img'],
        'affichage' => $data['affichage']
    ]);
}