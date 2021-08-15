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
        'categorie' =>  ['NonVide', 'Match',    'Mot'],
        'prix' =>       ['NonVide', 'Nombre'],
        'temps' =>      ['NonVide', 'Nombre'],
        'supplement' => ['Vide',    'AlphaNum'],
        'img' =>        ['Vide',    'FormatImg'],
        'affichage' =>  ['Vide',    'AlphaNum']
        ],
    'produit' =>
        [
        'type' =>       ['NonVide', 'Mot'],
        'titre' =>      ['NonVide', 'AlphaNum'],
        'categorie' =>  ['NonVide', 'Match',    'Mot'],
        'prix' =>       ['NonVide', 'Nombre'],
        'promo' =>      ['Vide',    'Nombre'],
        'enstock' =>    ['NonVide', 'OuiNon'],
        'img' =>        ['Vide',    'FormatImg'],
        'affichage' =>  ['Vide',    'AlphaNum']
        ],
    'contact' =>
        [
        'nom' =>        ['NonVide', 'Mot'],
        'prenom' =>     ['NonVide', 'Mot'],
        'telephone' =>  ['NonVide', 'Mot'],
        'mail' =>       ['NonVide', 'Mail'],
        'question' =>   ['NonVide', 'AlphaNum']
        ]
    ]
);

define('CATEGORIE',
    ['service' =>
        [
        'brushing' =>       ['Brushing Femme'],
        'coupe' =>          ['Coupes Brushing Femme'],
        'coloration' =>     ['Coloration Femme'],
        'meche' =>          ['Mèches - Balayage'],
        'soin' =>           ['Soins Profond'],
        'homme' =>          ['Hommes'],
        'enfant' =>         ['Enfants'],
        'evenementiel' =>   ['Evénementiel'],
        'special' =>        ['Prestations spécifiques'],
        'forfait' =>        ['Forfait'],
        'ongle' =>          ['Beauté des Ongles'],
        ],
    'produit' =>
        [
        'shampooing' =>     ['Shampooings'],
        'masque' =>         ['Masques'],
        'pack' =>           ['Pack'],
        'routine' =>        ['Routine']
        ],
    'promo' =>
        [
        'shampooing' =>     ['Shampooings'],
        'masque' =>         ['Masques'],
        'pack' =>           ['Pack'],
        'routine' =>        ['Routine']
        ]
    ]
);
//fopen