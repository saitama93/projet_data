<?php
    function affichage(){

        //Connection à la base de données
        $pdo = new PDO('mysql:host=localhost;dbname=festivals;charset=utf8', 'root', '');

        //Definitions des attributs
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Retour des éléments de la base de données
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        
        $affich_donnee = $pdo->query('SELECT nom_de_la_manifestation FROM liste_festivals WHERE departement = 39 ');

        return $affich_donnee->fetchAll();
    }

?>