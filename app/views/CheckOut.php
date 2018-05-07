<?php
session_start();
if (!isset($_SESSION["logged_in"])) header('Location:login');
include("navbar.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="app/css/globalstyle.css">
</head>
<body>
<form action="app/php/controlClass/checkout.php" method="post">
    <b>Num CHAMBRE</b>
    <input type="number" id="chambre" class="floatLabel" name="chambre">
    <button type="submit" name="Submit">CheckOut</button>
</form>

<?php
include("foot.php");
?>
</body>

</html>