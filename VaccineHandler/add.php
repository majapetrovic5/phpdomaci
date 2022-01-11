<?php

require "../model/vakcina.php";
require '../broker.php';
$broker=Broker::getBroker();

if(isset($_POST['naziv']) && isset($_POST['proizvodjac'])){

    $vakcina = new Vakcina(null, $_POST['naziv'], $_POST['proizvodjac']);
    $result = Vakcina::add($vakcina, $broker);

    if(!$response){
        echo $broker->getMysqli()->error; }
     
     else{
         echo 1;
         }
}


?>