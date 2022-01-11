<?php

require "../model/vakcina.php";
require '../broker.php';
$broker=Broker::getBroker();

if(isset($_POST['id'])){

    $vakcina = new Vakcina($_POST['id']);
    $response = $vakcina->deleteById($broker);
  
    if(!$response){
       echo $broker->getMysqli()->error; }
    
    else{
        echo 1;
        }
}

?>