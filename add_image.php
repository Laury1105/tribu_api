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

// ADD IMAGE
if(!empty($_POST["file_name"])){
    $requete = $pdo->prepare("INSERT INTO `images` (`id`, `file_name`) VALUES (NULL, :file_name);");
    $requete->bindParam(':file_name', $_POST["file_name"]);
    $requete->execute();

    $return["success"] = true;
    $return["message"] = "L'image a été ajouté";
    $return["result"] = array();
}
else{
    $return["success"] = false;
    $return["message"] = "Il manque le fichier image";
}


echo json_encode($return)
?>

