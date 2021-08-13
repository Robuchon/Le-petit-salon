<?php
// verification du status return BOOL
function connexion (): bool {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return !empty($_SESSION['connecte']);
}

// verification de l'etat de connexion avec redirection
function pageAdmin () {
    if (connexion() === false) {
        header ('Location: /auth');
        exit;
    }
    if (connexion() === true) {
        header ('Location: /admin');
        exit;
    }
}

// fonction d'authentification
// a finir pour le MDP
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