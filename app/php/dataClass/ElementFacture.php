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
    public $TYPE;
    public $Quantite;

    public function showInSelect()
    {
        // THIS METHOD IMPLIES ECHOING <table> FIRST !!
        echo '<option value=' . $this->ELEMENTID . '>' . $this->NAME . '</option>';
    }

    public static function startSelect()
    {
        echo "<select name='selectElement'>";
    }

    public static function endSelect()
    {
        echo "</select>";
    }

    public static function printSelect($a)
    {
        self::startSelect();
        foreach ($a as $v){
            $v->showInSelect();
        }
        self::endSelect();
    }

    public static function startTable()
    {
        echo "<table bgcolor='silver' width='600px'>";
    }

    public static function endTable()
    {
        echo "</table>";
    }

    public function showInRow()
    {
        // THIS METHOD IMPLIES ECHOING <table> FIRST !!
        echo '<tr><td>' . $this->PRICE . '</td><td>' . $this->NAME . '</td><td>' . $this->Quantite . '</td></tr>';
    }

    public static function printArray($a)
    {
        self::startTable();
        $total = 0;
        foreach ($a as $v) {
            $v->showInRow();
            $total += $v->PRICE * $v->Quantite;
        }
        echo '<tr><td><td><td>' . $total . '</td>';
        self::endTable();
    }

}