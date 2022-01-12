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
        $query = "SELECT v.*,p.naziv as proizvodjac_vakcine, count(vak.id) as zakazane_vakcinacije FROM vakcina v 
        INNER JOIN proizvodjac p ON (v.proizvodjac=p.id)
        LEFT JOIN vakcinacije vak ON (v.id=vak.vakcina) GROUP BY v.id";
        return $broker->query($query);
    }

    #funkcija getById //vidi za join

    public static function getById($id, Broker $broker){
        $query = "SELECT * FROM vakcina WHERE id=$id";
        return $broker->query($query);

    }

    #deleteById

    public function deleteById(Broker $broker)
    {
        $query = "DELETE FROM vakcina WHERE id=$this->id";
        return $broker->query($query);
    }

    #update   //ili da zovemo nad objektom kojim menjamo, a saljemo id objekta koji se menja
    public function update(Vakcina $vakcina, Broker $broker)
    {
        $query = "UPDATE vakcina set naziv = '$vakcina->naziv',
        proizvodjac = '$vakcina->proizvodjac' WHERE id='$this->id'";
        return $broker->query($query);
    }

    #insert add
    public static function add(Vakcina $vakcina, Broker $broker)
    {
        $query = "INSERT INTO vakcina(naziv, proizvodjac) VALUES('$vakcina->naziv','$vakcina->proizvodjac')";
        return $broker->query($query);
    }
} 

?>