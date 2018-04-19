<?php
/**
 * Created by PhpStorm.
 * User: hamouda
 * Date: 19/04/2018
 * Time: 17:16
 */

class Agent
{
    public $AGENTID;
    public  $LastName;public $FirstName;
    public $Address;
    public  $NumTel;
    public $Login_Agent;
    public $Password_Agent;

    public function __construct($id,$last,$first,$add,$tel,$log,$pass)
    {
        $this->AGENTID = $id;
        $this->LastName = $last;
        $this->FirstName = $first;
        $this->Address =$add;
        $this->NumTel = $tel;
        $this->Login_Agent = $log;
        $this->Password_Agent = $pass;
    }

}