<?php
/**
 * Created by PhpStorm.
 * User: hamouda
 * Date: 15/04/2018
 * Time: 21:02
 */

class ElementFacture
{
    public $elementid;
    public $name;
    public $price;

    public function showInRow(){
        // THIS METHOD IMPLIES ECHOING <table> FIRST !!
        echo "<tr><td>".$this->elementid."<td>".$this->name."<td>".$this->price."</tr>";
    }
    public static function startTable(){
        echo "<table>";
    }
    public static function endTable(){
        echo "</table>";
    }

}