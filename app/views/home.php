<!DOCTYPE html>
<html>
<head>
    <title>Home Page </title>

    <link rel="stylesheet" href="app/css/homepage.css" type="text/css">
    <link rel="stylesheet" href="app/css/font-awesome.css">
    <link href='app/css/css.css' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="app/css/icon.css">

    <link rel="stylesheet" href="app/css/form_check_in.css">

</head>
<body>
<div>
    <?php
        include("navbar.php");
    ?>

    <h2>Choisir chambre</h2>

    <div>

        <img width="300px" src="img/room1.png"  class="chambre"/>
        <img width="300px" src="img/room2.png"  class="chambre"/>
        <br>
        <img width="300px" src="img/room3.png" class="chambre"/>
        <img width="300px" src="img/room4.png" class="chambre"/>

    </div>
    <br><br><br><br>

    <div>
        <button id="facture" class="col-1-4">Génerer facture</button>
    </div>

    <br><br><br><br>
    <div>

        <p align="left">adresse : ceci est une adresse</p>
        <p align="right">Phone : ceci est un numéro</p>

    </div>

</div>
<script src='app/js/jquery-1.7.2.min.js'></script>
<script src="app/js/form_check_in.js"></script>
<script src='app/js/jquery.min.js'></script>
<script src='app/js/jquery-ui-autocomplete.js'></script>
<script src='app/js/jquery-ui-autocomplete.js'></script>
<script src='app/js/jquery.select-to-autocomplete.min.js'></script>
</body>
</html>