<?php

require "../model/vakcinacija.php";
require '../broker.php';
$broker=Broker::getBroker();

if(isset($_POST['id']) && isset($_POST['vakcina']) && isset($_POST['ime']) && isset($_POST['prezime'])
&& isset($_POST['doza']) && isset($_POST['datum']) ) {

    $vakcinacijaKojomMenjam = new Vakcinacija(null, $_POST['vakcina'], $_POST['ime'],
    $_POST['prezime'], $_POST['doza'], $_POST['datum']);

    $vakcinacijaKojuMenjam = new Vakcinacija($_POST['id']);

    $response = $vakcinacijaKojuMenjam->update($vakcinacijaKojomMenjam, $broker);

    if(!$response){
        echo $broker->getMysqli()->error; }
     
     else{
         echo 1;
         }
}


?>