<?php

    // Routing

    $uri = $_SERVER['REQUEST_URI'];
    
    $parts = explode('/',rtrim($uri,'/'));
    // var_dump($parts[1]);die;

    require 'vendor/autoload.php';
  
    //Rendu du template

    $loader = new Twig_Loader_Filesystem('views');
    $twig = new Twig_Environment($loader, [

        'cache' => false //'tmp'
    ]); 


    if(($parts[1] == 'projet_data')){

        if(isset($parts[2])){

            switch($parts[2]){

                case '':
                    echo $twig -> render('accueil.twig.html');
                break;

                // case 'accueil':
                //     // echo $twig -> render('accueil.twig.html');
                //     require 'controllers/controller.php';
                // break;

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

                case 'test':

                require_once("models/connexion_bdd.php");
                require_once("controllers/festival_Controller.php");
                selectionAllFestival($pdo, $twig);

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
