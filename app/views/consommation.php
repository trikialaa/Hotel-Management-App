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
    <link rel="stylesheet" href="app/css/globalstyle.css">
</head>
<body>

<h2 class="heading">Consommation</h2>
<form method="get" id="formconsommation">

    <div class="controls">
        <b>Numéro de la chambre</b>
        <input type="number" id="chambre" name="chambre" placeholder="Numéro de la chambre" required>
    </div>


    <div class="controls">
        <b>Article commandé</b>
        <?php ElementFacture::printSelect($listConsumable) ?>
    </div>

    <div class="controls">
        <b>Quantité</b>
        <input type="number" id="quantite" name="quantite" placeholder="Quantité" required>
    </div>

    <div class="controls">

        <br>
        <button id="confirm" type="submit" class="col-1-4">Confirmer</button>
        <br>
        <button id="cancel" type="reset" class="col-1-4">Cancel</button>
        <br>

    </div>
</form>
<br><br><br>
<?php
include("foot.php");
?>
</body>
</html>