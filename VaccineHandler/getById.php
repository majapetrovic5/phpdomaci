<?php

require "../model/vakcina.php";
require '../broker.php';
$broker=Broker::getBroker();

if(isset($_GET['id'])){
    $resultSet = Vakcina::getById($_GET['id'],$broker);
    $reponse=null;
    if(!$resultSet){
    $response['status']=0;
    $response['greska']=$broker->getMysqli()->error;
}
else{
    $response['status']=1;
    $response['vakcina']=$resultSet->fetch_object();
}

echo json_encode($response);
}

?>