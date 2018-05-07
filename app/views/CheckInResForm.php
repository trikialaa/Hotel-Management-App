<?php
session_start();
if (!isset($_SESSION["logged_in"])) header('Location:login');
require 'app/php/controlClass/BDRequestManager.php';

if (isset($_GET) && isset($_GET['client']) && isset($_GET['sejour'])) {
    $bdrm = BDRequestManager::getInstance();
    $client = $bdrm->getClient($_GET['client']);
    $sejour = $bdrm->getSejour($_GET['sejour']);
    $chambre = $bdrm->getChambre($sejour->CHAMBREID);
} else {
    header("Location: /home");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CheckIn</title>
    <link rel="stylesheet" href="app/css/globalstyle.css">


</head>

<body>

<form action="">

    <?php
    if (isset($_GET) && isset($_GET['client']) && isset($_GET['sejour'])) {

        echo "</form><form action = 'app/php/controlClass/checkinReservation.php?sejour=" . $_GET['sejour'] . "' method='post'> ";


        echo '<div>
        <div class="form-group">
            <h2 class="heading"  style="text-align: center" >Check-in</h2>
            <br>
            <fieldset>
                <h2 class="heading">Information de la réservation </h2>

            </fieldset>
        </div>

        <p align="left">
            <b> Nom</b></p>
        <div class="controls">
            <p class="floatLabel" size="15">' . $client->Nom . ' ' . $client->Prenom . '</p>
        </div>


        <p align="left">
            <b> type id</b></p>
        <div class="controls">
            <p class="floatLabel" size="15">' . $client->IDType . '</p>
        </div>


        <p align="left">
            <b>Id Client: </b></p>
        <div class="controls">
            <p class="floatLabel" size="15">' . $client->IDNumber . '</p>
        </div>


        <p align="left">
            <b> Num Tel client</b></p>
        <div class="controls">
            <p class="floatLabel" size="15">' . $client->NTel . '</p>
        </div>


        <p align="left">
            <b > Type chambre </b>
            <div class="controls">
                <p class="floatLabel" size="15" >' . $chambre->TYPE . '</p>
            </div>
        <p align="left">
            <b> Arrivé </b>
            <div class="controls">
        <p class="floatLabel" size="15">' . $sejour->CheckIn . '</p>
        </div>
        <p align="left">
            <b>Départ </b>
            <div class="controls">
        <p class="floatLabel" size="15">' . $sejour->CheckOut . '</p>
        </div>

</div>';
    }

    ?>

    <br>
    <br>
    <br>
    <br>

    <?php
    if (isset($chambre)) {
        if ($chambre->TYPE == 'DOUBLE') {
            echo '<h2 class="heading">Les details du Deuxieme Client</h2>
            <div class="controls">
            <b>Nom </b>
            <input type="text" id="nom" class="floatLabel" name="nom" placeholder="Nom" required>
        </div>
        <div class="controls">
            <b>Prénom </b>
            <input type="text" id="prenom" class="floatLabel" name="prenom" placeholder="Prénom" required>
        </div>


        <div class="controls">
            <b>Type </b>
            <select class="floatLabel" name="idtype" id="idtype">
                <option value="CIN">CIN</option>
                <option value="Passeport">Passeport</option>
            </select>
        </div>


        <div class="controls">
            <b>Numéro ID </b>
            <input type="text" id="idnumber" class="floatLabel" name="idnumber" placeholder="CIN/Passeport" required>
        </div>

        <div class="controls">
            <b>Numéro Téléphone client</b>
            <input type="tel" id="phone" class="floatLabel" name="phone" placeholder="Téléphone" required>
        </div>
        
        
            <div class="controls">
                <b>Email</b>
                <input type="text" id="email" class="floatLabel" name="email" required>
        
            </div>
        
            <div class="grid">
                <div class="controls">
                    <div class="controls">
                        <b>Adresse</b>
                        <input type="text" id="street" class="floatLabel" name="street" required>
        
                    </div>
                </div>
        
            </div>
           
                </div>
            </div>          
        
            </div>
        
            <br>
            <br>
            <br>
            <br>';
        }
    }
    ?>

    <div>
        <button type="submit" value="Submit" class="col-1-4">Valider</button>
    </div>
    </div>
</form>
<?php
include("foot.php");
?>


</body>

</html>