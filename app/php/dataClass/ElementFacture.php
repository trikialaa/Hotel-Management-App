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
        echo "<table align='center' width='600px' border='1'>";
        echo '<tr style="background: #535c6b"><td>Nom de l\'article</td><td>Quantité</td><td>Prix unitaire</td></tr>';
    }

    public static function endTable()
    {
        echo "</table>";
    }

    public function showInRow()
    {
        echo '<tr><td>' . $this->NAME . '</td><td>' . $this->Quantite . '</td><td>' . $this->PRICE . '</td></tr>';
    }

    public static function printArray($a)
    {
        self::startTable();
        $total = 0;
        foreach ($a as $v) {
            $v->showInRow();
            $total += $v->PRICE * $v->Quantite;
        }
        $total = number_format($total, 3, '.', '');
        echo '<td colspan="2">TOTAL :<td>' . $total . '</td>';
        self::endTable();
    }

}