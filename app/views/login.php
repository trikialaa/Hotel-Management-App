<?php
session_start();
session_destroy(); //on doit supprimer la session si on est redirigé vers login (botuon logout)
session_start();
?>


<!DOCTYPE html>
<html lang="en" >


<head>
    <meta charset="UTF-8">
    <title>Système de gestion de l'hôtel Royal Venus</title>
    <link rel="stylesheet" href="app\css\login.css">
</head>

<body>

<div id="box1" class="box blurred-bg tinted">
    <div class="content">
        <div>
            <div class="img_container">
                <img src="app\img\logo_blue.png" alt="Avatar" class="avatar">
            </div>
            <br><br>
            <h1 style="font-size: 40px;text-transform: uppercase; font-weight: bolder;">Système de gestion de
                l'hôtel<br>Royal Venus</h1>
            <form action="app\php\controlClass\login.php" method="post">
                <div class="container">
                    <label for="username" style="color:#1b7099;font-weight: bolder;"><b>Nom de l'utilisateur</b></label>
                    <input id="username" type="text" placeholder="Entrez votre nom d'utilisateur" name="username"
                           required>

                    <label for="password" style="color:#1b7099;font-weight: bolder;"><b>Mot de passe</b></label>
                    <input id="password" type="password" placeholder="Entrez votre mot de passe" name="password"
                           required>

                    <div class="container">
                        <button type="submit" class="cancel_btn">Valider</button>
                        <button type="button" class="cancel_btn">Annuler</button>
                    </div>
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> Se souvenir de moi
                    </label>
                </div>
            </form>

        </div>


    </div>
</div>
</body>
</html>
