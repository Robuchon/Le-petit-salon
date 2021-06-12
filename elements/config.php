<?php
define('JOURS', [
    'Lundi',
    'Mardi',
    'Mercredi',
    'Jeudi',
    'Vendredi',
    'Samedi',
    'Dimanche'
]);

define('CRENEAUX', [
    [],
    [
        [9, 18]
    ],
    [
        [9, 17],
    ],
    [
        [9, 18]
    ],
    [
        [8, 18]
    ],
    [
        [9, 17],
    ],
    []    
]);

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