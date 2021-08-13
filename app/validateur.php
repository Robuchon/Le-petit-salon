<?php
// validation des formulaires avant remplissage des BDs
// recuperation de la constante dans le PHP config
// et comparaison avec les validateur associé
function validateur($data, $type = null) {
    $valid = VALIDATEUR;
    if (!isset($type)) {
        $type = $data['type'];
  }
    $validateurs = $valid["$type"];
    foreach ($validateurs as $validateur => $key) {
        $fonction = 'valid';
        $fonction .= "$key[0]";
        $result["$validateur"] = call_user_func($fonction, $data[$validateur]);
        if (isset($key[1])) {
            $fonction = 'valid';
            $fonction .= "$key[1]";
            if (!call_user_func($fonction, $data[$validateur]) === '') {
                $result["$validateur"] .= ', ';
                $result["$validateur"] .= call_user_func($fonction, $data[$validateur]);
            }
        }
        if (isset($key[2])) {
            $fonction = 'valid';
            $fonction .= "$key[2]";
            if (call_user_func($fonction, $data[$validateur]) !== '') {
                $result["$validateur"] .= ', ';
                $result["$validateur"] .= call_user_func($fonction, $data[$validateur]);
            }
        }
        if (isset($key[3])) {
            $fonction = 'valid';
            $fonction .= "$key[3]";
            if (call_user_func($fonction, $data[$validateur]) !== '') {
                $result["$validateur"] .= ', ';
                $result["$validateur"] .= call_user_func($fonction, $data[$validateur]);
            }
        }
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
    $match = matchService($data['type']);
    if (!in_array($data, $match)) {
        return "c'est pas une categorie valide ";
    };
}

// validateur peut etre vide
function validVide () {
    return;
}