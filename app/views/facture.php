<?php
session_start();
if (!isset($_SESSION["logged_in"])) header('Location:login');
include("navbar.php");

?>

<?php require 'app/php/controlClass/BDRequestManager.php';
if (isset($_GET['roomnumber'])) {
    $bdrm = BDRequestManager::getInstance();
    $res = $bdrm->generateFacture($bdrm->getSejourFromRoom($_GET['roomnumber']));
    if (sizeof($res) == 0) {
        $res = null;
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>single rooms</title>
    <link rel="stylesheet" href="app/css/font-awesome.css">
    <link href='app/css/css.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="app/css/icon.css">
    <link rel="stylesheet" href="app/css/form_check_in.css">
    <link rel="stylesheet" type="text/css" href="app/css/table.css">
    <link rel="stylesheet" type="text/css" href="app/css/modalForm.css">

    <style type="text/css">
        input.button {
            background: #c03000;
            color: white;
        }
    </style>
</head>
<body>


<div id="parentpage">

    <form method="get">
        <div id="dates">
            <input placeholder="Room Number" type="text" id="date_in" name="roomnumber">

            <input type="submit" onclick='' value="Rafraichir" name="refresh" class="button"/>

        </div>
    </form>
</div>

<div>
    <?php
    if (isset($res)) {
        ElementFacture::printArray($res);
    }
    ?>
</div>


</body>
<script src='app/js/jquery-1.7.2.min.js'></script>
<script src='app/js/jquery.min.js'></script>
<script src='app/js/jquery-ui-autocomplete.js'></script>
<script src='app/js/jquery-ui-autocomplete.js'></script>
<script src='app/js/jquery.select-to-autocomplete.min.js'></script>

</html>