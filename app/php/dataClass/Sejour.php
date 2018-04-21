<?php
/**
 * Created by PhpStorm.
 * User: hamouda
 * Date: 21/04/2018
 * Time: 17:14
 */

class Sejour
{
    public $SEJOURID;
    public $CheckIn;
    public $CheckOut;
    public $CHAMBREID;
    public $RESERVE;


    private function __construct()
    {
    }

    public function showInRow(){
        // THIS METHOD IMPLIES ECHOING <table> FIRST !!
        echo "<tr><td>".$this->SEJOURID."</td><td>".$this->CheckIn."</td><td>".$this->CheckOut."</td><td>".$this->CHAMBREID."</td><td>".$this->RESERVE."</td></tr>";
    }
    public static function startTable(){
        echo "<table>";
    }
    public static function endTable(){
        echo "</table>";
    }

    public static function printArray($a){
        self::startTable();
        foreach ($a as $v){
            $v->showInRow();
        }
        self::endTable();
    }

}