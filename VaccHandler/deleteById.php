<?php

require "../model/vakcinacije.php";
require '../broker.php';
$broker=Broker::getBroker();

if(isset($_POST['id'])){

    $vakcinacija = new Vakcinacija($_POST['id']);
    $response = $vakcinacija->deleteById($broker);
  
    if(!$response){
       echo $broker->getMysqli()->error; }
    
    else{
        echo 1;
        }
}

?>