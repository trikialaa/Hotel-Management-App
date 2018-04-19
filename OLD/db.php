<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'dbhotel';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $use, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Connexion établie avec succès
}
catch(PDOException $e)
{
    //Erreur de connexion
}