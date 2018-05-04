<?php
session_start();
if (!isset($_SESSION["logged_in"])) header('Location:login');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home page</title>
    <link rel="stylesheet" href="app/css/homepage.css" type="text/css">
    <link rel="stylesheet" href="app/css/welcome.css" type="text/css">

    <link rel="stylesheet" href="app/css/font-awesome.css">
    <link href='app/css/css.css' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="app/css/icon.css">

    <link rel="stylesheet" href="app/css/form_check_in.css">

</head>
<body>
<header class="header">
    <?php
    include("navbar.php");
    ?>
</header>
<div class="box">
    <h1>Bienvenue</h1>
</div>

<footer class="footer">
    <div>
        <p align="left" style="color: white"><i class="material-icons">home</i> adresse </p>
        <p align="right" style="color: white"><i class="material-icons">phone</i> Phone </p>

    </div>
</footer>

<script src='app/js/jquery-1.7.2.min.js'></script>
<script src="app/js/form_check_in.js"></script>
<script src='app/js/jquery.min.js'></script>
<script src='app/js/jquery-ui-autocomplete.js'></script>
<script src='app/js/jquery-ui-autocomplete.js'></script>
<script src='app/js/jquery.select-to-autocomplete.min.js'></script>


</body>
</html>