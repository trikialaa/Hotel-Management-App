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
        <input type="text" id="nom" class="floatLabel" name="nom" required>
        <label for="nom">Nom</label>
    </div>

    <div class="controls">
        <input type="text" id="prenom" class="floatLabel" name="prenom" required>
        <label for="prenom">Prenom </label>
    </div>
    <div class="controls">
        <input type="text" id="tel" class="floatLabel" name="tel" required>
        <label for="tel">Numero Téléphone </label>
    </div>
    <div class="controls">
        <input type="text" id="adresse" class="floatLabel" name="adresse" required>
        <label for="adresse">Adresse </label>
    </div>

    <div class="controls">
        <input type="text" id="login" class="floatLabel" name="login" required>
        <label for="login">Login </label>
    </div>


    <div class="controls">
        <input type="password" id="mdp" class="floatLabel" name="mdp" required>
        <label for="mdp">Mot de passe </label>
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