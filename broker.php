<?php

class Broker{
    private $mysqli;
    private static $broker;


    public function getMysqli(){
        return $this->mysqli;
    }

    private function __construct(){
        
        $this->mysqli = new mysqli("localhost", "root", "", "covidbaza");
        $this->mysqli->set_charset("utf8");
      
        if ($this->mysqli->connect_errno){
            exit("Neuspesna konekcija: Greska> ".$this->mysqli->connect_error.", Err kod>"
            .$this->mysqli->connect_errno);
        } 

    }

    public static function getBroker(){
        if(!isset($broker)){
            $broker=new Broker();
        }
        return $broker;
    }
    
    public function query($upit){
        return $this->mysqli->query($upit);
    }
    
   
}

?>
