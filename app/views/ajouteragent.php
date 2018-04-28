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
    <h2 class="heading">Ajouter agent</h2>

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
        <button type="submit" class="col-1-4">confirmer</button>
        <button type="reset" class="col-1-4">annuler</button>
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