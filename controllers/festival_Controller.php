<?php

// FONCTION QUI AFFICHE TOUS LES FESTIVALS
function selectionAllFestival($pdo, $twig)
{
    $affich_donnee = $pdo->query('SELECT * FROM liste_festivals');

    $res = $affich_donnee->fetchAll();

    echo $twig->render('tous_les_festivals.html.twig', [
        "donnees" => $res
    ]);
}

// FONCTION QUI AFFICHE LES INFOS DES FESTIVALS
function affichAllInfoFestivals($pdo, $twig)
{
    $affich_donnee = $pdo->query('SELECT * FROM liste_festivals');
    $res = $affich_donnee->fetchAll();
    echo $twig->render('pop-up.html.twig', [
        "donnees" => $res
    ]);
}
// FONCTION QUI AFFICHE LES INFOS DU MOIS DE JUIN
function affichJuin($pdo, $twig)
{
    $affich_donnee = $pdo->query(

        'SELECT * FROM liste_festivals WHERE mois_indicatif ="Juin" UNION
        SELECT * FROM liste_festivals WHERE date_debut BETWEEN "01/06/2019" AND "30/06/2019" UNION
        SELECT * FROM liste_festivals WHERE date_de_fin BETWEEN "01/06/2019" AND "30/06/2019"
    '
    );
    $res = $affich_donnee->fetchAll();
    echo $twig->render('juin.html.twig', [
        "donnees" => $res
    ]);
}

function selectionSearchFestival($pdo, $twig)
{
    
  if((empty($_POST['region'])) && ((empty($_POST['nom']))) ){

    $affich_donnee = $pdo->query('SELECT * FROM liste_festivals');

    $res = $affich_donnee->fetchAll();


  }else  if(isset($_POST['region']) && !empty($_POST['region'])){
    $affich_donnee = $pdo->query("SELECT * FROM `liste_festivals` WHERE `region` LIKE '%".$_POST['region']."%' ORDER BY `id` ASC");

    $res = $affich_donnee->fetchAll();
    // print_r($res);
   
   }else  if(isset($_POST['nom']) && !empty($_POST['nom'])){


    $affich_donnee = $pdo->query("SELECT * FROM `liste_festivals` WHERE `nom_manifestation` LIKE '%".$_POST['nom']."%' ORDER BY `id` ASC");

    $res = $affich_donnee->fetchAll();
   }
   echo $twig->render('form.html.twig', [
        "donnees" => $res
    ]);
}

// FONCTION POUR LES 100KM

function test($pdo, $twig){

    if(isset($_POST['depart'])){
        $villeDepart=$_POST['depart'];
        $latStart=$ville[$villeDepart]['latitude'];
        $longStart=$ville[$villeDepart]['longitude'];
        // $coordonnees = $ville[$villeDepart]['']
        $latCardStart=$ville[$villeDepart]['latCard'];
        $longCardStart=$ville[$villeDepart]['longCard'];
    }   

    foreach($ville as $key =>$value){

        if($value["longCard"]!=$longCardStart){
            $longA= -$longStart;
        }else{
            $longA=$longStart;
        }
        $distance=6371*
              acos( cos($value["latitude"])*
                    cos($latStart)*
                    cos($longA-$value["longitude"])+
                    sin($value["latitude"])*
                    sin($latStart)
                   );
    echo "<br>distance de ".$villeDepart." à ".$key." : ".$distance." km<br/>"; 
    }

    $affich_donnee = $pdo->query('SELECT * FROM liste_festivals');

    $res = $affich_donnee->fetchAll();

    echo $twig->render('test.html.twig', [
        "donnees" => $res
    ]);
}
