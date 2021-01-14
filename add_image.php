<?php
include 'header.php';
// ADD IMAGE
if(!empty($_POST["file_name"])){
    $requete = $pdo->prepare("INSERT INTO `images` (`id`, `file_name`) VALUES (NULL, :file_name);");
    $requete->bindParam(':file_name', $_POST["file_name"]);
    $requete->execute();

    $return["result"] = array();
    return_json(true, "L'image a été ajouté",$return);
    
}
else{
    return_json(false,"Il manque le fichier image");

}


echo json_encode($return)
?>

