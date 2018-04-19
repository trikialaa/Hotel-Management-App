<?php
/**
 * Created by PhpStorm.
 * User: olfa
 * Date: 19/04/2018
 * Time: 20:19
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reservation</title>
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="css/form_check_in.css">

</head>
<body>
<form method="POST" action="../public/php/controlClass/Reservation.php" >
    <div class="form-group">
        <h2 class="heading">Effectuer réservation</h2>

        <div class="controls">
            <b> <i class="material-icons">person</i> &nbsp;&nbsp; Cin Client: </b>
            <input type="text" id="cin" class="floatLabel" name="cin" placeholder="CIN" required>
        </div>

        <div class="controls">
            <b> <i class="material-icons">phone</i> &nbsp;&nbsp; Num Tel client</b>
            <input type="tel" id="phone" class="floatLabel" name="phone" placeholder="Tel">
        </div>

    </div>

    <div class="grid">

        <div class="col-1-4 col-1-4-sm">
            <div class="controls">
                <b> <i class="fa fa-calendar"></i>&nbsp;&nbsp;Arrivé </b>
                <input type="date" id="arrive" class="floatLabel" name="arrive" value="<?php echo date('Y-m-d'); ?>">

            </div>
        </div>
        <div class="col-1-4 col-1-4-sm">
            <div class="controls">
                <b> <i class="fa fa-calendar"></i>&nbsp;&nbsp;Départ </b>
                <input type="date" id="depart" class="floatLabel" name="depart" value="<?php echo date('Y-m-d'); ?>" />

            </div>
        </div>
    </div>
    <div class="controls">
        <b > <i class="fa fa-home"></i>&nbsp;&nbsp;Type chambre </b>
        <select class="floatLabel" name="liste" id="liste">
            <option value="chambre single">single</option>
            <option value="chambre double">double</option>
            <option value="chambre triple">triple</option>
        </select>
    </div>
    <div class="grid">
        <button type="submit" value="Submit" class="col-1-4">Valider</button>
    </div>

</form>


</body>
</html>