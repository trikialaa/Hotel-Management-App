<?php
session_start();
if (!isset($_SESSION["logged_in"])) header('Location:login');
include("navbar.php");

require 'app\php\controlClass\BDRequestManager.php';


$bdrm = BDRequestManager::getInstance();
$listConsumable = $bdrm->getAllElementFacture();

if (isset($_GET['chambre']) && $_GET['quantite']) {

    if ($_GET['chambre'] != '' && $_GET['quantite'] != '') {
        $sejourid = $bdrm->getSejourFromRoom($_GET['chambre']);
        if ($sejourid > 0) {
            $bdrm->resolveConsumption($sejourid, $_GET['selectElement'], $_GET['quantite']);
        } else {
            echo "ERROR";
        }

    }
}
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
<form method="get" id="formconsommation"><!--formulaire consommation-->


    <div class="controls">
        <input type="text" id="chambre" class="floatLabel" name="chambre">
        <label for="chambre">Numéro chambre </label>
    </div>


    <div class="controls">
        <?php ElementFacture::printSelect($listConsumable) ?>


    </div>


    <div class="controls">
        <div class="controls">
            <input type="text" id="quantite" class="floatLabel" name="quantite">
            <label for="quantite">Quantité</label>
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