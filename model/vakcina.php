<?php


//require './broker.php';
//$broker=Broker::getBroker();

class Vakcina{  //dodaj jos neke atribute

    public $id;   
    public $naziv;   
    public $proizvodjac;   
    
    
    public function __construct($id=null, $naziv=null, $proizvodjac=null)
    {
        $this->id = $id;
        $this->naziv = $naziv;
        $this->proizvodjac = $proizvodjac;

    }

    #funkcija prikazi sve getAll //vidi za join

    public static function getAll(Broker $broker)
    {
        $query = "SELECT * FROM vakcine";
        return $broker->query($query);
    }

    #funkcija getById //vidi za join

    public static function getById($id){
        $query = "SELECT * FROM vakcine WHERE id=$id";
        return $broker->query($query);

    }

    #deleteById

    public function deleteById(Broker $broker)
    {
        $query = "DELETE FROM vakcine WHERE id=$this->id";
        return $broker->query($query);
    }

    #update   //ili da zovemo nad objektom kojim menjamo, a saljemo id objekta koji se menja
    public function update(Vakcina $vakcina, Broker $broker)
    {
        $query = "UPDATE vakcine set naziv = $vakcina->naziv,
        proizvodjac = $vakcina->proizvodjac WHERE id=$this->id";
        return $broker->query($query);
    }

    #insert add
    public static function add(Vakcina $vakcina, Broker $broker)
    {
        $query = "INSERT INTO vakcine(naziv, proizvodjac) VALUES('$vakcina->naziv','$proizvodjac->proizvodjac')";
        return $broker->query($query);
    }
} 

?>