<?php

$host = 'localhost';
$user = 'root';
$pass = '';
<<<<<<< HEAD
$db = 'hotel';
=======
$db = 'dbhotel';
>>>>>>> 09d62c89a4aff68a44b70496a0e9d8618f456382

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $use, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Connexion établie avec succès
}
catch(PDOException $e)
{
    //Erreur de connexion
}