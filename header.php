<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
//CONNECTION
try{
  $pdo = new PDO('mysql:host=localhost;posrt=8889;dbname=api','root','root');
} catch(Exception $e){
  return_json(false,"Connecion à la base de donnée impossible" );

}
function return_json($success, $message, $results = NULL){
    $return["success"] = $success;
    $return["message"] = $message;
    $return["results"] = $results;
     
    echo json_encode($return);

}
?>