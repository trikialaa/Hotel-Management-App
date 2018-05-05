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

    <link rel="stylesheet" href="app/css/globalstyle.css">

</head>
<body>
<header class="header">
    <?php
    include("navbar.php");
    ?>
</header>

<?php
include("foot.php");
?>

</body>
</html>