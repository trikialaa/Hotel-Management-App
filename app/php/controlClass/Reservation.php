<?php
/**
 * Created by PhpStorm.
 * User: olfa
 * Date: 19/04/2018
 * Time: 20:06
 */

if (isset($_POST['submit'])) {
    try{
        $db = new PDO('mysql:host=localhost;dbname=basehotel','root','');
        $db->query("use basehotel");
        $req=$db->prepare('INSERT INTO reservation(CIN, Numerotel, Date_arrive, Date_depart, TypeChambre) VALUES (?,?,?,?,?)') ;
        $req->execute(array($_POST['cin'],$_POST['phone'],$_POST['arrive'],$_POST['depart'],$_POST['type']));

    }
    catch (PDOException $e)
    {
        print"Erreur : ".$e->getMessage();
        die();
    }


}

?>