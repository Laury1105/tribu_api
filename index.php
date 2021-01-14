<?php
//what page are we on
if(isset($_GET['page']) && !empty($_GET['page'])){
  $currentPage = (int) strip_tags($_GET['page']); //we force the "int" and we delete the tags for more security

}else{
  $currentPage = 1;
}
//CONNECTION
include 'header.php';

//How many results
$requete = $pdo->prepare("SELECT COUNT(*) AS nb_results FROM `images`");
$requete->execute();
$result =  $requete->fetch();
$nbResults = (int) $result['nb_results'];

//How many results per page
$perPage = 5;
//How many pages
$pages = ceil($nbResults / $perPage);

//Calculation of the first result of the page
$firstResult = ( $currentPage * $perPage) - $perPage;
//GET ALL IMAGES
$requete = $pdo->prepare("SELECT * FROM `images` LIMIT :firstresult, :perpage");
$requete->bindValue(':firstresult', $firstResult, PDO::PARAM_INT);
$requete->bindValue(':perpage', $perPage, PDO::PARAM_INT);
$requete->execute();


$images["results"]["images"]= $requete->fetchAll();

return_json(true,"Voici la liste des images", $images )
?>

