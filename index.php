<?php

// Routing

$uri = $_SERVER['REQUEST_URI'];

$parts = explode('/', rtrim($uri, '/'));
// var_dump($parts[1]);die;

require 'vendor/autoload.php';

//Rendu du template

$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader, [

    'cache' => false //'tmp'
]);


if (($parts[1] == 'projet_data')) {

    if (isset($parts[2])) {

        switch ($parts[2]) {

            case '':
                echo $twig->render('accueil.html.twig');
                break;

            case 'accueil':
                echo $twig->render('accueil.html.twig');
                // require 'controllers/controller.php';
                break;

            case 'agenda':
                echo $twig->render('agenda.html.twig');
                break;

            case 'autour_de_moi':
                // echo $twig->render('autour_de_moi.html.twig');
                require_once("models/connexion_bdd.php");
                require_once("controllers/festival_Controller.php");
                affichAllInfoFestivalsADM($pdo, $twig);
                break;

            case 'tous_les_festivals':
                require_once("models/connexion_bdd.php");
                require_once("controllers/festival_Controller.php");
                selectionSearchFestival($pdo, $twig);
                break;

            case 'contact':
                echo $twig->render('contact.html.twig');
                break;

            case 'contact_ajax':
                require_once("controllers/mail_controller.php");
                break;

            case 'coordonate_ajax':
                require_once("controllers/coordonate_controller.php");
                break;

            default:
                header('HTTP/1.0 404 Not Found');
                echo $twig->render('404.html.twig');
                break;
        }
    } else {

        echo $twig->render('accueil.html.twig');
    }
}
