<?php

require "../model/vakcina.php";
require '../broker.php';
$broker=Broker::getBroker();

if(isset($_POST['id']) && isset($_POST['naziv']) && isset($_POST['proizvodjac'])){

    $vakcinaKojomMenjam = new Vakcina(null, $_POST['naziv'], $_POST['proizvodjac']);
    $vakcinaKojuMenjam = new Vakcina($_POST['id']);
    $response = $vakcinaKojuMenjam->update($vakcinaKojomMenjam, $broker);

    if(!$response){
        echo $broker->getMysqli()->error; }
     
     else{
         echo 1;
         }
}


?>