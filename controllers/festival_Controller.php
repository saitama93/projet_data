<?php

// FONCTION QUI AFFICHE TOUS LES FESTIVALS

function selectionAllFestival($pdo, $twig){
    $affich_donnee = $pdo->query('SELECT * FROM liste_festivals');

    $res = $affich_donnee->fetchAll();

    echo $twig->render('tous_les_festivals.html.twig',[
        "donnees" => $res
    ]);
}

// FONCTION QUI AFFICHE LES INFOS DES FESTIVALS

function affichAllInfoFestivals($pdo, $twig){

    $affich_donnee = $pdo->query('SELECT nom_manifestation, date_debut, date_de_fin, site_web, domaine, complement_domaine FROM liste_festivals');
    $res = $affich_donnee->fetchAll();

    echo $twig->render('test.html.twig',[

        "donnees" => $res

    ]);
}
// function afficheAllInfosFestivals



