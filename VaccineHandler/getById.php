<?php

require "../model/vakcina.php";
require '../broker.php';
$broker=Broker::getBroker();

if(isset($_POST['id'])){
    $resultSet = Vakcina::getById($_POST['id'],$broker);
    $reponse=[];
    if(!$resultSet){
    $response['status']=0;
    $response['greska']=$broker->getMysqli()->error;
}
else{
    $response['status']=1;
    while($row=$resultSet->fetch_object()){
        $response['vakcina'][]=$row;
    }
}

echo json_encode($response);
}

?>