<?php

?>
<div id="navbar">

    <a class="logo" href="http://localhost:3000/home"><img src="/app/img/logo_white.png" height="60px"></a>
    <a class="link" href="http://localhost:3000/reservation">Réservation</a>
    <a class="link" href="http://localhost:3000/confirmerReservation">Confirmer Reservation</a>
    <a class="link" href="http://localhost:3000/roomstate">Etat Des Chambres</a>
    <a class="link" href="http://localhost:3000/CheckOut">Check Out</a>
    <a class="link" href="http://localhost:3000/consomation">Consommation</a>
    <a class="link" href="http://localhost:3000/facture">Factures</a>
    <?php
    if ($_SESSION['admin'] === true) {
        echo('<a class="link" href="http://localhost:3000/ajouteragent">Ajouter Agent</a>'); //ajout du bouton si admin connecté
    }
    ?>
    <a class="user" href="login">Logout</a>
    <a class="user" href="#">Bienvenue <?php echo $_SESSION["Prenom"]; ?></a>
    <link rel="stylesheet" type="text/css" href="app/css/navbarstyle.css" media="screen" />
</div>
<br>
<br>