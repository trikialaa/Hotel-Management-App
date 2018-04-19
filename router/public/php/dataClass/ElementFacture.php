<?php
/**
 * Created by PhpStorm.
 * User: hamouda
 * Date: 15/04/2018
 * Time: 21:02
 */

class ElementFacture
{
    public $ELEMENTID;
    public $NAME;
    public $PRICE;

    public function showInRow(){
        // THIS METHOD IMPLIES ECHOING <table> FIRST !!
        echo "<tr><td>".$this->ELEMENTID."</td><td>".$this->NAME."</td><td>".$this->PRICE."</td></tr>";
    }
    public static function startTable(){
        echo "<table>";
    }
    public static function endTable(){
        echo "</table>";
    }

}