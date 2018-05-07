<?php
session_start();
if (!isset($_SESSION["logged_in"])) header('Location:login');
include("navbar.php");

require 'app/php/controlClass/BDRequestManager.php';

$bdrm = BDRequestManager::getInstance();

$reservations = $bdrm->getTodayReservations();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirmer Reservation</title>
    <link rel="stylesheet" href="app/css/globalstyle.css">
</head>
<body>
<table align='center' width='600px' border='1'>
    <tr style="background: #535c6b">
        <td>Nom du Client</td>
        <td>Date de CheckOut</td>
        <td>Num Tel</td>
        <td>CheckIn</td>
    </tr>
    <?php

    foreach ($reservations as $reservation) {

        echo "<tr><td>" . $reservation->Nom . " " . $reservation->Prenom . "</td><td>" . $reservation->CheckOut . "</td>
                    <td>" . $reservation->NTel . "</td><td><button onclick='red(" . $reservation->SEJOURID . "," . $reservation->CLIENTID . ")'> CheckIn</button></td></tr>";
    }
    ?>
</table>

<?php
include("foot.php");
?>
</body>
<script type="text/javascript">
    function red(a, b) {
        var url = "http://localhost:3000/CheckInResForm?sejour=" + a + "&client=" + b;
        //var url = "http://localhost:3000/";
        window.location.href = url;
    }
</script>
</html>