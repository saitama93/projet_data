<?php

    // Routing

    $uri = $_SERVER['REQUEST_URI'];
    
    $parts = explode('/',rtrim($uri,'/'));
    // var_dump($parts);die;

    require 'vendor/autoload.php';
  
    //CONNECTION A LA BASE DE DONNEES

    try
    {
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=CSV_DB;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
    }

    // On récupère tout le contenu de la table codeurs
    
    $reponse = $bdd->query('SELECT *
    FROM codeurs
    INNER JOIN region
    ON codeurs.id_region = region.id');

    //Rendu du template

    $loader = new Twig_Loader_Filesystem('views');
    $twig = new Twig_Environment($loader, [

        'cache' => false //'tmp'

    ]); 

    function affichage(){

        //Connection à la base de données
        $pdo = new PDO('mysql:host=localhost;dbname=CSV_DB;charset=utf8', 'root', '');

        //Definitions des attributs
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Retour des éléments de la base de données
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        
        $affichage = $pdo->query('SELECT * FROM TBL_NAME ');
        return $affichage;
    }

    // var_dump(affichage());die;

    // var_dump(affichage());
    if(($parts[1] == 'back_end') && ($parts[2] == 'projet_data')){

            
        switch($parts[3]){

            case '':
                echo $twig -> render('accueil.twig.html'); //,['affichage' => affichage()]
            break;

            case 'home':
                echo $twig -> render('accueil.twig.html', ['affichage' => affichage()]); 
            break;

            case 'agenda':
                echo $twig -> render('agenda.twig.html');
            break;

            case 'autour_de_moi':
                echo $twig -> render('autour_de_moi.twig.html');
            break;

            case 'tout_les_festivals':
                echo $twig -> render('tout_les_festivals.twig.html');
            break;

            
            case 'contact': 

                echo $twig ->render('contact.twig.html');
            break;

            default: 

                header('HTTP/1.0 404 Not Found');
                echo $twig -> render ('404.twig.html');
            break;
        }
    }
    
?>
