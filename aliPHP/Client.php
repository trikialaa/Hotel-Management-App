<?php
/**
 * Created by PhpStorm.
 * User: hamouda
 * Date: 15/04/2018
 * Time: 17:57
 */

class Client
{
    public $id;
    public $nom;
    public $prenom;
    public $ntel;
    public $email;
    public $idtype;
    public $idnumber;

    private function __construct()
    {
    }

    public function showInRow(){
        // THIS METHOD IMPLIES ECHOING <table> FIRST !!
        echo "<tr><td>".$this->id."<td>".$this->nom."<td>".$this->prenom."<td>".$this->ntel."<td>".$this->email."<td>".$this->idtype."<td>".$this->idnumber."</tr>";
    }
    public static function startTable(){
        echo "<table>";
    }
    public static function endTable(){
        echo "</table>";
    }







}