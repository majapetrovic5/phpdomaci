<?php

require './broker.php';
$broker=Broker::getBroker();

class Proizvodjac{
    public $id;   
    public $naziv;   
    
    
    public function __construct($id=null, $naziv=null)
    {
        $this->id = $id;
        $this->naziv = $predmet;
    }

    #funkcija prikazi sve getAll

    public static function getAll()
    {
        $query = "SELECT * FROM proizvodjac";
        return $broker->executeQuery($query);
    }

    #funkcija getById

    public static function getById($id){
        
        $query = "SELECT * FROM proizvodjac WHERE id=$id";
        return $broker->executeQuery($query);

    } }

?>