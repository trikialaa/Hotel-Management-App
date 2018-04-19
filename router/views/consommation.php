<?php
/**
 * Created by PhpStorm.
 * User: olfa
 * Date: 19/04/2018
 * Time: 20:10
 */
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ajouter consommation</title>
</head>
<body>

<h1>consommation</h1>
<form action="" id="formconsommation" ><!--formulaire consommation-->
    <input placeholder="n° chambre" type="text" id="numchambre">
    <br>
    <select id="typeconsommation">
        <option>mekla fel bit</option>
        <option>café/bar</option>
        <option>ironing/washing clothes</option>
    </select>
    <br>
    <input placeholder="tarif">
    <br>
    <button id="cancel" type="reset"  >cancel</button>
    <br>
    <button id="confirm" type="submit" >confirmer</button>
</form>

</body>
</html>