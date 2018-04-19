<?php
if( $_SERVER["REQUEST_METHOD"] == "POST") {
    // connexion à la bd
    $db=new PDO('mysql:host=localhost;dbname=basehotel','root','');

    $id = $_POST['cin'];

    if (isset($_POST['submit'])) {
        $sql="SELECT * FROM reservation WHERE (CIN='".$id."') ";
        $rep = $db->query($sql);
        if( ! $rep )
            die(var_export($db->errorinfo(), true));
        if( $rep->rowCount()) {
            echo 'Cin existant'; }


    }
 


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservation</title>
    <link rel="stylesheet" href="css_reserve.css">
</head>
<body>
<form method="POST" action="" >
    <div class="form-group">
        <h2 class="heading">Vérifier réservation</h2>

        <div class="controls">
            <input id="cin" type="text" name="cin" class="floatLabel">
            <label for="cin">CIN</label>
        </div>

        <div class="grid">
            <input type="submit" name="submit" value="Vérifier" id="log">
        </div>
    </div>
</form>

</body>
</html>