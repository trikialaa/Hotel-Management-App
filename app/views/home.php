<?php
session_start();
if (!isset($_SESSION["logged_in"])) header('Location:login');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>

    <link rel="stylesheet" href="app/css/globalstyle.css">

</head>
<body>

<?php
include("navbar.php");
?>

<?php
include("foot.php");
?>

</body>
</html>