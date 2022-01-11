<?php

require "../model/vakcinacija.php";
require '../broker.php';
$broker=Broker::getBroker();

if(isset($_POST['id'])){
    $resultSet = Vakcinacija::getById($_POST['id'],$broker);
    $reponse=[];
    if(!$resultSet){
    $response['status']=0;
    $response['greska']=$broker->getMysqli()->error;
}
else{
    $response['status']=1;
    while($row=$resultSet->fetch_object()){
        $response['vakcinacija'][]=$row;
    }
}

echo json_encode($response);
}

?>