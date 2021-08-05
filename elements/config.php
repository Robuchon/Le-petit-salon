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
        'services' =>   ['NonVide', 'Match', 'Mot'],
        'temps' =>      ['Nombre'],
        'prix' =>       ['Nombre'],
        'supplement' => ['AlphaNum'],
        'img' =>        ['Vide'],
        'affichage' =>  ['AlphaNum']
        ],
    'produit' =>
        [
        'type' =>       ['NonVide', 'Mot'],
        'titre' =>      ['NonVide', 'AlphaNum'],
        'produit' =>    ['NonVide', 'Match', 'Mot'],
        'prix' =>       ['Nombre'],
        'promo' =>      ['Nombre'],
        'img' =>        ['Vide'],
        'affichage' =>  ['AlphaNum']
        ]
    ]
);
