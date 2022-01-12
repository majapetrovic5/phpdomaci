<?php

//require './broker.php';
//$broker=Broker::getBroker();

class Proizvodjac{
    public $id;   
    public $naziv;   
    
    
    public function __construct($id=null, $naziv=null)
    {
        $this->id = $id;
        $this->naziv = $predmet;
    }

    #funkcija prikazi sve getAll

    public static function getAll(Broker $broker)
    {
        $query = "SELECT * FROM proizvodjac";
        return $broker->query($query);
    }

    #funkcija getById

    public static function getById($id,Broker $broker){
        
        $query = "SELECT * FROM proizvodjac WHERE id=$id";
        return $broker->query($query);

    } }

?>