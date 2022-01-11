<?php

require "../model/vakcinacija.php";
require '../broker.php';
$broker=Broker::getBroker();

if(isset($_POST['vakcina']) && isset($_POST['ime']) && isset($_POST['prezime'])
&& isset($_POST['doza']) && isset($_POST['datum']) ){

    $vakcinacija = new Vakcinacija(null, $_POST['vakcina'], $_POST['ime'],
    $_POST['prezime'], $_POST['doza'],$_POST['datum']);
    $result = Vakcinacija::add($vakcinacija, $broker);

    if(!$response){
        echo $broker->getMysqli()->error; }
     
     else{
         echo 1;
         }
}


?>