<?php
require_once("models/connexion_bdd.php");

function positionUtilisateur($dept)
{
    global $pdo;
    $sql = "SELECT * FROM liste_festivals WHERE `code_postal` LIKE :dept ";
    $sth = $pdo->prepare($sql);
    $sth->bindValue(":dept", $dept.'%', PDO::PARAM_STR);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC); 
}





$result = positionUtilisateur($_POST['postcode']);

echo json_encode($result);