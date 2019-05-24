<?php

// FONCTION QUI AFFICHE TOUS LES FESTIVALS

function selectionAllFestival($pdo, $twig){
    $affich_donnee = $pdo->query('SELECT * FROM liste_festivals');

    $res = $affich_donnee->fetchAll();

    echo $twig->render('tous_les_festivals.twig.html',[
        "donnees" => $res
    ]);
}

// FONCTION QUI AFFICHE LES INFOS DES FESTIVALS

// function afficheAllInfosFestivals



