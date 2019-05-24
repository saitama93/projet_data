<?php

// FONCTION QUI AFFICHE TOUS LES FESTIVALS

function selectionAllFestival($pdo, $twig){
    $affich_donnee = $pdo->query('SELECT * FROM liste_festivals');

    $res = $affich_donnee->fetchAll();

    echo $twig->render('test.twig.html',[
        "donnees" => $res
    ]);
}



