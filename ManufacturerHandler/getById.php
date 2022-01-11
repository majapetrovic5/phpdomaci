<?php

require "../model/proizvodjac.php";
require '../broker.php';
$broker=Broker::getBroker();

if(isset($_POST['id'])){
    $resultSet = Proizvodjac::getById($_POST['id'],$broker);
    $reponse=[];
    if(!$resultSet){
    $response['status']=0;
    $response['greska']=$broker->getMysqli()->error;
}
else{
    $response['status']=1;
    while($row=$resultSet->fetch_object()){
        $response['proizvodjac'][]=$row;
    }
}

echo json_encode($response);
}

?>