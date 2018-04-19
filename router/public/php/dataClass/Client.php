<?php
/**
 * Created by PhpStorm.
 * User: hamouda
 * Date: 15/04/2018
 * Time: 17:57
 */

class Client
{
    public $CLIENTID;
    public $Nom;
    public $Prenom;
    public $NTel;
    public $EMail;
    public $IDType;
    public $IDNumber;


    private function __construct()
    {
    }

    public function showInRow(){
        // THIS METHOD IMPLIES ECHOING <table> FIRST !!
        echo "<tr><td>".$this->CLIENTID."</td><td>".$this->Nom."</td><td>".$this->Prenom."</td><td>".$this->NTel."</td><td>".$this->EMail."</td><td>".$this->IDType."</td><td>".$this->IDNumber."</td></tr>";
    }
    public static function startTable(){
        echo "<table>";
    }
    public static function endTable(){
        echo "</table>";
    }







}