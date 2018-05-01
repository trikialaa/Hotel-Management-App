<?php
include("navbar.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>ajouter agent</title>
    <link rel="stylesheet" href="app/css/font-awesome.css">
    <link href='app/css/css.css' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="app/css/icon.css">

    <link rel="stylesheet" href="app/css/form_check_in.css">
</head>

<body>


<form>
    <h3 class="heading">Ajouter agent</h3>

    <div class="controls">
        <input type="text" id="nom" class="floatLabel" name=nom" required>
        <label for="nom">Nom</label>
    </div>

    <div class="controls">
        <input type="text" id="prenom" class="floatLabel" name="prenom" required>
        <label for="prenom">Prenom </label>
    </div>

    <div class="controls">
        <input type="text" id="nameAgent" class="floatLabel" name="nameAgent" required>
        <label for="nameAgent">Login </label>
    </div>


    <div class="controls">
        <input type="password" id="mdp" class="floatLabel" name="mdp" required>
        <label for="mdp">Mot de passe </label>
    </div>


    <br><br>

    <div>
        <button type="submit" class="col-1-4" class="cancel_btn">confirmer</button>
        <button type="reset" class="col-1-4" class="cancel_btn">annuler</button>
    </div>
</form>

<script src='app/js/jquery-1.7.2.min.js'></script>
<script src="app/js/form_check_in.js"></script>
<script src='app/js/jquery.min.js'></script>
<script src='app/js/jquery-ui-autocomplete.js'></script>
<script src='app/js/jquery-ui-autocomplete.js'></script>
<script src='app/js/jquery.select-to-autocomplete.min.js'></script>


</body>
</html>