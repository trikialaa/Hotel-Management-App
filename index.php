<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/homepage.css" type="text/css">
    <title></title>
</head>
<body>

<header>
    <img src=""><!--logo du hotel-->
    <p>ceci est le nom du hotel</p>
</header>
<br><br><br><br>
<div>
    <div>
        <p>welcome foulen </p>
    </div>


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
        <img src="../../../Desktop/3da122b332ca42a77da7e8e316f053e5.jpg"  class="chambre"/>
        <img src="../../../Desktop/Double-room-003.jpg"  class="chambre"/>
        <br>
        <img src="../../../Desktop/TripleRoom.jpg" class="chambre"/>
        <img src="../../../Desktop/Bungalow-Hotel-Simple.jpg" class="chambre"/>

    </div>

    <div>
        <button id="facture">génerer facture</button>
    </div>

    <br><br><br><br>
    <footer>

        <p align="left">adresse : ceci est une adresse</p>
        <p align="right">Phone : ceci est un numéro</p>

    </footer>

</div>

<script src="js/ajouterconso.js"></script>
</body>
</html>