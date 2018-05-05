<?php
session_start();
if (!isset($_SESSION["logged_in"]) || !isset($_SESSION["admin"]) || !$_SESSION["admin"]) header('Location:login');
include("navbar.php");

?>

<!DOCTYPE html>
<html>
<head>
    <title>ajouter agent</title>
    <link rel="stylesheet" href="app/css/globalstyle.css">
</head>
<body>


<form method="POST" action="app/php/controlClass/Ajout_Agent.php">
    <h2 class="heading">Ajouter Agent</h2>

    <div class="controls">
        <b> Nom </b>
        <input type="text" id="nom" class="floatLabel" name="nom" required>

    </div>

    <div class="controls">
        <b> Prenom </b>
        <input type="text" id="prenom" class="floatLabel" name="prenom" required>

    </div>
    <div class="controls">
        <b> Num TEL </b>
        <input type="text" id="tel" class="floatLabel" name="tel" required>

    </div>
    <div class="controls">
        <b> &nbsp;Adresse </b>
        <input type="text" id="adresse" class="floatLabel" name="adresse" required>

    </div>

    <div class="controls">
        <b> Login </b>
        <input type="text" id="login" class="floatLabel" name="login" required>

    </div>


    <div class="controls">
        <b> Mot de Passe </b>
        <input type="password" id="mdp" class="floatLabel" name="mdp" required>

    </div>


    <br><br>

    <div>
        <button type="submit" class="col-1-4">confirmer</button>
        <button type="reset" class="col-1-4">annuler</button>
    </div>
</form>

<?php
include("foot.php");
?>
<script src="app/php/controlClass/Ajout_Agent.php"></script>
</body>
</html>