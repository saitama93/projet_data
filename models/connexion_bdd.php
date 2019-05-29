<?php

// CONNEXION A LA BDD

    try
    {

        $pdo = new PDO('mysql:host=localhost;dbname=festivals;charset=utf8', 'root', '');

    }
    catch(Exception $e){

        die('Erreur: ' . $e->getMessage());
    }   
?>