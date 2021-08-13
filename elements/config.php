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

define('VALIDATEUR',
    ['service' =>
        [
        'type' =>       ['NonVide', 'Mot'],
        'titre' =>      ['NonVide', 'AlphaNum'],
        'categorie' =>  ['NonVide', 'Mot'],
        'temps' =>      ['Nombre'],
        'prix' =>       ['Nombre'],
        'supplement' => ['AlphaNum'],
        'img' =>        ['Vide'],
        'affichage' =>  ['AlphaNum']
        ],
    'produit' =>
        [
        'type' =>       ['NonVide', 'Mot'],
        'titre' =>      ['AlphaNum', 'NonVide'],
        'categorie' =>  ['Vide'],
        'prix' =>       ['Nombre'],
        'promo' =>      ['Vide'],
        'affichage' =>  ['AlphaNum'],
        'img' =>        ['Vide'],
        'enstock' =>    ['OuiNon']
        ]
    ]
);
