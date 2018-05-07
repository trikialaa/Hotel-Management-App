<?php
session_start();
if (!isset($_SESSION["logged_in"])) header('Location:login');


if (isset($_GET) && isset($_GET['chambreid']) && isset($_GET['type'])) {
} else {
    header("Location : /home");
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

<form action="app/php/controlClass/CheckIn.php?chambre=<?php echo $_GET['chambreid']; ?>&in=<?php echo $_GET['in']; ?>&out=<?php echo $_GET['out']; ?>"
      method="post">

    <h2 class="heading">Les details du Client</h2>
    <div class="controls">
        <b>Nom </b>
        <input type="text" id="nom" class="floatLabel" name="nom1" placeholder="Nom" required>
    </div>
    <div class="controls">
        <b>Prénom </b>
        <input type="text" id="prenom" class="floatLabel" name="prenom1" placeholder="Prénom" required>
    </div>


    <div class="controls">
        <b>Type </b>
        <select class="floatLabel" name="idtype1" id="idtype">
            <option value="CIN">CIN</option>
            <option value="Passeport">Passeport</option>
        </select>
    </div>


    <div class="controls">
        <b>Numéro ID </b>
        <input type="text" id="idnumber" class="floatLabel" name="idnumber1" placeholder="CIN/Passeport" required>
    </div>

    <div class="controls">
        <b>Numéro Téléphone client</b>
        <input type="number" id="phone" class="floatLabel" name="phone1" placeholder="Téléphone" required>
    </div>


    <div class="controls">
        <b>Email</b>
        <input type="email" id="email" class="floatLabel" name="email1" required>

    </div>


    <br>
    <br>
    <br>
    <br>

    <?php
    if (isset($_GET['type'])) {
        if (!strcmp($_GET['type'], 'DOUBLE')) {
            echo '<h2 class="heading">Les details du Deuxieme Client</h2>
            <div class="controls">
            <b>Nom </b>
            <input type="text" id="nom" class="floatLabel" name="nom2" placeholder="Nom" required>
        </div>
        <div class="controls">
            <b>Prénom </b>
            <input type="text" id="prenom" class="floatLabel" name="prenom2" placeholder="Prénom" required>
        </div>


        <div class="controls">
            <b>Type </b>
            <select class="floatLabel" name="idtype2" id="idtype">
                <option value="CIN">CIN</option>
                <option value="Passeport">Passeport</option>
            </select>
        </div>


        <div class="controls">
            <b>Numéro ID </b>
            <input type="text" id="idnumber" class="floatLabel" name="idnumber2" placeholder="CIN/Passeport" required>
        </div>

        <div class="controls">
            <b>Numéro Téléphone client</b>
            <input type="tel" id="phone" class="floatLabel" name="phone2" placeholder="Téléphone" required>
        </div>
        
        
            <div class="controls">
                <b>Email</b>
                <input type="text" id="email" class="floatLabel" name="email2" required>
        
            </div>
       
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