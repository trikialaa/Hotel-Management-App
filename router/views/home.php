<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="css\homepage.css" type="text/css">
    <title></title>
</head>
<body>
<div>
    <?php
        include("navbar.php");
    ?>


    <button id="ajouterconso" onclick="ouvrirconso()">ajouter consommation</button>

    <dialog id="consodialogue"><!--boite de dialogue consommation-->
        <h6>consommation</h6>
        <form action="" id="formconsommation" method="dialog"><!--formulaire consommation-->
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
            <button id="cancel" type="reset" onclick="fermerconso()" >cancel</button>
            <br>
            <button id="confirm" type="submit" >confirmer</button>
        </form>
    </dialog>

    <div>
        <h2>choisir chambre</h2>
        <img width="300px" src="img/room1.png"  class="chambre"/>
        <img width="300px" src="img/room2.png"  class="chambre"/>
        <br>
        <img width="300px" src="img/room3.png" class="chambre"/>
        <img width="300px" src="img/room4.png" class="chambre"/>

    </div>

    <div>
        <button id="facture">génerer facture</button>
    </div>

    <br><br><br><br>
    <div>

        <p align="left">adresse : ceci est une adresse</p>
        <p align="right">Phone : ceci est un numéro</p>

    </div>

</div>

<script src="js\ajouterconso.js"></script>
</body>
</html>