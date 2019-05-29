<?php
// header('Access-Control-Allow-Origin: *');
// require_once("connect.php");
/*if($_POST['distance'] != 0){
	$distance = $_POST['distance'];
}else{
	$distance=1500; // définition d'une distance par défaut
}

// Préparation de la requête SQL. Celle-ci sélectionnera tous les points dont la "distance" sera inférieure à la distance choisie par l'utilisateur
// Cette distance est issue du calcul commençant par 6371, qui permet de travailler en kilomètres
$sql = "SELECT id, nom, lat, lon, ( 6371 * acos( cos( radians(".$_POST['lat'].") ) * cos( radians( lat ) ) * cos( radians( lon ) - radians(".$_POST['lon'].") ) + sin( radians(".$_POST['lat'].") ) * sin( radians( lat ) ) ) ) AS distance FROM points HAVING distance < ".$distance." ORDER BY distance";

$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll();
echo json_encode($result);

require_once("close.php");*/