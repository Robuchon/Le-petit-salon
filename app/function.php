<?php 

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

function path(string $pathway, string $adress) {
    $filename = "$pathway/../view/$adress.php";
    if (file_exists($filename)) {
        return (require $filename);
    } else { return (require "$pathway/../view/accueil.php");
    }
}

function subpath(string $pathway, string $adress, string $subadress) {
    $filename = "$pathway/../view/$adress/$subadress.php";
    if (file_exists($filename)) {
        return (require $filename);
    } else { return (require "$pathway/../view/accueil/service.php");
    }
}

function creneaux_html (array $creneaux) {
    if (empty($creneaux)) {
        return 'Fermé';
    }
    foreach ($creneaux as $creneau) {
        $phrases = " <strong>0{$creneau[0]}:00</strong> à <strong>{$creneau[1]}:00</strong>";
    }
    return $phrases;
}

function in_creneaux ($heure, $creneaux) 
{
    foreach ($creneaux as $creneau) {
        if ($heure >= $creneau[0] && $heure < $creneau[1]) {
            return true;
        }
    }
    return false;
}

function connexion (): bool {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return !empty($_SESSION['connecte']);
}

function pageAdmin () {
    if (connexion() === false) {
        header ('location: /auth');
        exit;
    }
}

function auth ($auth) {
    $erreurs = [];
    $user = 'a';
    $password = password_hash('b', PASSWORD_DEFAULT, ['cost' => 12]);
    if (isset($auth['username']) || isset($auth['password'])) {
        if (empty($auth['username'])) {
            $erreurs['username'] = 'Identifiant vide';
        } 
        if (empty($auth['password'])) {
            $erreurs['password'] = 'Mot de pass vide';
        }
        if (!empty($auth['username']) && !empty($auth['password'])) {
            if ($auth['username'] === $user && password_verify($auth['password'], $password)) {
                return 1;
            } else {
                $erreurs['username'] = 'Identifiant et/ou mot de passe incorrects';
            }
        }
    }
    if (!empty($erreurs)) {
        return $erreurs;
    }
}