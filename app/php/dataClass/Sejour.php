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



    public function __construct()
    {
        if(func_num_args()!=0){
            $this->SEJOURID = func_get_arg(0)->SEJOURID;
            $this->CheckIn = func_get_arg(0)->CheckIn;
            $this->CheckOut = func_get_arg(0)->CheckOut;
            $this->CHAMBREID = func_get_arg(0)->CHAMBREID;
            $this->RESERVE = func_get_arg(0)->RESERVE;
        }
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