<?php

class Broker{
    //private $result;
    private $mysqli;
    private static $broker;

    /* public function getRezultat(){
        return $this->rezultat;
    } */
    
    public function getMysqli(){
        return $this->mysqli;
    }

    private function __construct(){
        $this->mysqli = new mysqli("localhost", "root", "Petrovic.maja99", "covidbaza");

        if ($this->$mysqli->connect_errno){
            exit("Neuspesna konekcija: Greska> ".$this->$mysqli->connect_error.", Err kod>"
            .$this->$mysqli->connect_errno);
        }

        $this->mysqli->set_charset("utf8");
    }

    public static function getBroker(){
        if(!isset($broker)){
            $broker=new Broker();
        }
        return $broker;
    }
    
    public function executeQuery($upit){
        return $this->mysqli->query($upit);
    }
    
   
}

?>
