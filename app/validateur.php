<?php
// validation des formulaires avant remplissage des BDs
// recuperation de la constante dans le PHP config
// et comparaison avec les validateur associé
function validateur($data, $type = null) {
    $valid = VALIDATEUR;
    $verification2 = "";
    $verification3 = "";
    if (!isset($type)) {
        $type = $data['type'];
    }
    $validateurs = $valid["$type"];
    foreach ($validateurs as $validateur => $key) {
        $fonction = 'valid';
        $fonction .= "$key[0]";
        $verification = call_user_func($fonction, $data[$validateur]);
        $verification .= '. ';
        if (isset($key[1])) {
            $fonction = 'valid';
            $fonction .= "$key[1]";
            $verification2 = call_user_func($fonction, $data[$validateur]);
            $verification2 .= '. ';
        }
        if (isset($key[2])) {
            $fonction = 'valid';
            $fonction .= "$key[2]";
            $verification3 = call_user_func($fonction, $data[$validateur]);
            $verification3 .= '. ';
        }
        if ($verification === '. ') {
            $verification = null;
        }
        if ($verification2 === '. ') {
            $verification2 = null;
        }
        if ($verification3 === '. ') {
            $verification3 = null;
        }
        $result["$validateur"] = "$verification$verification2$verification3";
    }
    return $result;                  
}
/* reste a faire une verification en premier lieux si le champ peut etre plein vide ou les 2
et dans les cas ou c'est vide ne pas faire les autres verification*/

// validateur un nombre entier
function validNumerique($data) {
    if (!is_numeric($data)) {
        return "c'est pas un nombre";
    };
}

// validateur si oui ou non
function validOuiNon($data) {
    $attendu = ['oui', 'non'];
    if (!in_array($data,$attendu)) {
        return 'Pas en stock';
    };
}

// validateur caractere alphanumerique
function validAlphaNum($data) {
    if (!preg_match("/^([-,+'’€&().éàè!\w+\s])+$/i", $data)) {
        return "caractère saisi pas conforme";
    };
}

// validateur un mot
function validMot($data) {
    if (!preg_match("/^[a-z]+$/i", $data)) {
        return "c'est pas un mot";
    };
}

// validateur un nombre
function validNombre($data) {
    if (!preg_match("/^[.,0-9]+$/i", $data)) {
        return "c'est pas un chiffre";
    };
}

// validateur ne doit pas etre vide
function validNonVide($data) {
    if (empty($data)) {
        return "c'est vide";
    };
}

// validateur corespondance avec la categorie
function validMatch($data) {
    $adress = adress();
    $type = $adress[3];
    $match = CATEGORIE[$type];
    if (!array_key_exists($data, $match)) {
        return "c'est pas une categorie valide ";
    } else {
        return null;
    };
}

// validateur peut etre vide
function validVide () {
    return;
}

function validFormatImg () {
    return;
}