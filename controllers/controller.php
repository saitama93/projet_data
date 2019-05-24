<?php

    require 'models/model.php'; //Chargement du model

    $donnees = affichage(); //Appel de la fonction 

    $tableau = [

        'donnees' => $donnees
    ];

    echo $twig -> render('accueil.twig.html', $tableau);
?>