<?php
session_start();
if (!isset($_SESSION["logged_in"])) header('Location:login');
include("navbar.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ajouter Consommation</title>
    <link rel="stylesheet" href="app/css/font-awesome.css">
    <link href='app/css/css.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="app/css/icon.css">
    <link rel="stylesheet" href="app/css/form_check_in.css">
</head>
<body>

<h2 class="heading">Consommation</h2>
<form action="" id="formconsommation"><!--formulaire consommation-->


    <div class="controls">
        <input type="text" id="chambre" class="floatLabel" name="chambre">
        <label for="chambre">Numéro chambre </label>
    </div>


    <div class="controls">
        <input type="text" id="name" class="floatLabel" name="name">
        <label for="name">Désignation</label>
    </div>


    <div class="controls">
        <div class="controls">
            <input type="text" id="prix" class="floatLabel" name="prix">
            <label for="prix">Prix</label>
        </div>

        <br>
        <button id="cancel" type="reset" class="col-1-4" style="color: white">Cancel</button>
        <br>
        <button id="confirm" type="submit" class="col-1-4" style="color: white">Confirmer</button>
</form>
<script src='app/js/jquery-1.7.2.min.js'></script>
<script src="app/js/form_check_in.js"></script>
<script src='app/js/jquery.min.js'></script>
<script src='app/js/jquery-ui-autocomplete.js'></script>
<script src='app/js/jquery-ui-autocomplete.js'></script>
<script src='app/js/jquery.select-to-autocomplete.min.js'></script>


</body>
</html>