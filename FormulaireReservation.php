<?php
if (isset($_POST['submit'])) {
    try{
        $db = new PDO('mysql:host=localhost;dbname=basehotel','root','');
        $db->query("use basehotel");
        $req=$db->prepare('INSERT INTO reservation(CIN, Numerotel, Date_arrive, Date_depart, TypeChambre) VALUES (?,?,?,?,?)') ;
        $req->execute(array($_POST['cin'],$_POST['phone'],$_POST['arrive'],$_POST['depart'],$_POST['type']));

    }
    catch (PDOException $e)
    {
        print"Erreur : ".$e->getMessage();
        die();
    }


}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reservation</title>

</head>
<body>
<form method="POST" action="" >
    <div class="form-group">
        <h2 class="heading">Effectuer réservation</h2>

        <div class="controls">
            <input type="text" id="cin" class="floatLabel" name="cin" required>
            <label for="cin">CIN</label>
        </div>

        <div class="controls">
            <input type="tel" id="phone" class="floatLabel" name="phone">
            <label for="phone">Tel</label>
        </div>

    </div>

    <div class="grid">

        <div class="col-1-4 col-1-4-sm">
            <div class="controls">
                <input type="date" id="arrive" class="floatLabel" name="arrive" value="<?php echo date('Y-m-d'); ?>">
                <label for="arrive" class="label-date"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Date d'arrivé</label>
            </div>
        </div>
        <div class="col-1-4 col-1-4-sm">
            <div class="controls">
                <input type="date" id="depart" class="floatLabel" name="depart" value="<?php echo date('Y-m-d'); ?>" />
                <label for="depart" class="label-date"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Date de départ</label>
            </div>
        </div>
    </div>
    <div class="controls">
        <select class="floatLabel" name="liste" id="liste">
            <option value="chambre single">single</option>
            <option value="chambre double">double</option>
            <option value="chambre triple">triple</option>
        </select>
        <label for="liste">Type chambre</label>
    </div>
    <div class="grid">
        <input type="submit" name="submit" value="Résever" id="log">
    </div>

</form>


</body>
</html>
