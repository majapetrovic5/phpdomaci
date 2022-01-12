<?php


//require '../broker.php';
//$broker=Broker::getBroker();

class Vakcinacija{  //dodaj jos neke atribute //vidi za vakcinu da ne bude primarni kljuc,
    //dovoljan je vec sam id

    public $id;   
    public $vakcina;   
    public $ime;   
    public $prezime;   
    public $doza;   
    public $datum;   
    
    
    public function __construct($id=null, $vakcina=null, $ime=null,$prezime=null,$doza=null,
    $datum=null)
    {
        $this->id = $id;
        $this->vakcina = $vakcina;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->doza = $doza;
        $this->datum = $datum;

    }

    #funkcija prikazi sve getAll //vidi za join

    public static function getAll(Broker $broker)
    {
        $query = "SELECT vak.*,v.naziv as vakcina_naziv FROM vakcinacije vak INNER JOIN vakcina v ON (vak.vakcina=v.id)";
        return $broker->query($query);
    }

    public static function getAllByVaccine($VakcinaId, Broker $broker)
    {
        $query = "SELECT * FROM vakcinacije where vakcina=$VakcinaId";
        return $broker->query($query);
    }

        //FILTER FUNKCIJE getAllByDate, getAllByDose


    #funkcija getById //vidi za join

    public static function getById($id, Broker $broker){
        $query = "SELECT * FROM vakcinacije WHERE id=$id";
        return $broker->query($query);

    }

    #deleteById

    public function deleteById(Broker $broker)
    {
        $query = "DELETE FROM vakcinacije WHERE id=$this->id";
        return $broker->query($query);
    }

    #update   //ili da zovemo nad objektom kojim menjamo, a saljemo id objekta koji se menja
    public function update(Vakcinacija $vakcinacija,Broker $broker)
    {
        $query = "UPDATE vakcinacije set vakcina=$vakcinacija->vakcina,
        ime = $vakcinacija->ime,prezime = $vakcinacija->prezime, doza = $vakcinacija->doza,
        datum = $vakcinacija->datum WHERE id=$this->id";
        return $broker->query($query);
    }

    #insert add
    public static function add(Vakcinacija $vakcinacija, Broker $broker)
    {
        $query = "INSERT INTO vakcinacija(vakcina, ime, prezime, doza, datum) VALUES('$vakcinacija->vakcina',
        '$ime->ime', '$prezime->prezime','$doza->doza','$datum->datum')";
        return $broker->query($query);
    }
} 

?>