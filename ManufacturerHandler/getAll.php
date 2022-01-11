<?php

require "../model/proizvodjac.php";
require '../broker.php';
$broker=Broker::getBroker();


    $resultSet = Proizvodjac::getAll($broker);
    $reponse=[];
    
    if(!$resultSet){
    $response['status']=0;
    $response['greska']=$broker->getMysqli()->error; }

else{
    $response['status']=1;
    while($row=$resultSet->fetch_object()){
        $response['proizvodjaci'][]=$row;
    }
}

echo json_encode($response);


?>