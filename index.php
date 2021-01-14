<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
//connection
try{
  $pdo = new PDO('mysql:host=localhost;posrt=8889;dbname=api','root','root');
  $return["success"] = true;
  $return["message"] = "Connecion à la base de donnée réussi";
} catch(Exception $e){
  $return["success"] = false;
  $return["message"] = "Connecion à la base de donnée impossible";
}

//GET ALL IMAGES
$requete = $pdo->prepare("SELECT * FROM `images`");
$requete->execute();

$return["success"] = true;
$return["message"] = "Voici la liste des images";
$return["results"]["images"]= $requete->fetchAll();

echo json_encode($return)
?>

