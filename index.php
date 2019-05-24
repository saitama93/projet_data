<?php

    // Routing

    $uri = $_SERVER['REQUEST_URI'];
    
    $parts = explode('/',rtrim($uri,'/'));
    // var_dump($parts[1]);die;

    require 'vendor/autoload.php';
  
    //CONNECTION A LA BASE DE DONNEES

    // try
    // {
    //     // On se connecte à MySQL
    //     $bdd = new PDO('mysql:host=localhost;dbname=CSV_DB;charset=utf8', 'root', '');
    // }
    // catch(Exception $e)
    // {
    //     // En cas d'erreur, on affiche un message et on arrête tout
    //         die('Erreur : '.$e->getMessage());
    // }

    // On récupère tout le contenu de la table codeurs
    
    // $reponse = $bdd->query('SELECT *
    // FROM codeurs
    // INNER JOIN region
    // ON codeurs.id_region = region.id');

    //Rendu du template

    $loader = new Twig_Loader_Filesystem('views');
    $twig = new Twig_Environment($loader, [

        'cache' => false //'tmp'

    ]); 

    

    // $reponse = affichage();

    // while($donnees = $reponse -> fetch()){

    //     print_r($donnees->nom_de_la_manifestation);
    //     echo('//');
    // }die;

    //Termine le traitement de la requête

    // $reponse -> closeCurser();

    // var_dump(affichage());die;

    // var_dump(affichage());
    if(($parts[1] == 'projet_data')){

        if(isset($parts[2])){

            switch($parts[2]){

                case '':
                    echo $twig -> render('accueil.twig.html');
                break;

                case 'accueil':
                    // echo $twig -> render('accueil.twig.html');
                    require 'controllers/controller.php';
                break;

                case 'agenda':
                    echo $twig -> render('agenda.twig.html');
                break;

                case 'autour_de_moi':
                    echo $twig -> render('autour_de_moi.twig.html');
                    
                break;

                case 'tous_les_festivals':
                    echo $twig -> render('tous_les_festivals.twig.html', ['donnees' => $res ]);
                break;

                
                case 'contact': 
                    echo $twig ->render('contact.twig.html');
                break;

                

                default: 

                    header('HTTP/1.0 404 Not Found');
                    echo $twig -> render ('404.twig.html');
                break;
            }
        }else{

            echo $twig -> render('accueil.twig.html');
        }
    }
?>
