<?php

function validateur($data) {
    $type = $data['type'];
    $valid = VALIDATEUR;
    $validateurs = $valid["$type"];
    foreach ($validateurs as $validateur => $key) {
        $fonction = 'valid';
        $fonction .= "$key[0]";
        $result[] = call_user_func($fonction, $data[$validateur]);
    } 
    return $result;                  
}

function validNumerique($data) {
    if (!is_numeric($data)) {
        return "c'est pas un nombre";
    };
}

function validStock($data) {
    $attendu = ['oui', 'non'];
    if (!in_array($data,$attendu)) {
        return 'Pas en stock';
    };
}

function validAlphaNum($data) {
    if (!preg_match("/^([-,+'’€().éàè!\w+\s])+$/i", $data)) {
        return "c'est pas de l'alphanum";
    };
}

function validMot($data) {
    if (!preg_match("/^[a-z]+$/i", $data)) {
        return "c'est pas un mot";
    };
}

function validNombre($data) {
    if (!preg_match("/^[.,0-9]+$/i", $data)) {
        return "c'est pas un chiffre";
    };
}

function validNonVide($data) {
    if (empty($data)) {
        return "c'est vide";
    };
}

function validMatch($data) {
    $match = matchService();
    if (!in_array($data, $match)) {
        return "c'est pas un service valide ";
    };
}

function validVide () {
    return;
}

function validOuiNon($data) {
    if ($data = 'oui' || $data = 'non') {
        return ;
    } else {
        return "info non valide";
    }
    
}   
