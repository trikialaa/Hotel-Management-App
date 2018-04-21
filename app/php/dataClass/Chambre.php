<?php
/**
 * Created by PhpStorm.
 * User: hamouda
 * Date: 15/04/2018
 * Time: 20:15
 */

class Chambre
{
    public $CHAMBREID;
    public $TYPE;
    public $VueMer;

    /**
     * Chambre constructor.
     */
    public function __construct()
    {
    }

    public function showInRow(){
        // THIS METHOD IMPLIES ECHOING <table> FIRST !!
        echo "<tr><td>".$this->CHAMBREID."</td><td>".$this->TYPE."</td><td>".$this->VueMer."</td></tr>";
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
