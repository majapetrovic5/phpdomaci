<?php

require "../model/vakcinacija.php";
require '../broker.php';
$broker=Broker::getBroker();

if(isset($_GET['id'])){
    $resultSet = Vakcinacija::getAllByVaccine($_GET['id'],$broker);
    $reponse=[];
    if(!$resultSet){
    $response['status']=0;
    $response['greska']=$broker->getMysqli()->error;
}
else{
    $response['status']=1;
    while($row=$resultSet->fetch_object()){
        $response['vakcinacije'][]=$row;
    }
}

echo json_encode($response);
}

?>