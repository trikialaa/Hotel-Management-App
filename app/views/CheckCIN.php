<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservation</title>
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="app/css/form_check_in.css">
</head>
<body>
<form method="POST" action="app/php/controlClass/cin.php" >
    <div class="form-group">
        <h2 class="heading">Vérifier réservation</h2>

        <div class="controls">
            <b>Type id</b>
            <select class="floatLabel">
                <option>CIN</option>
                <option>N°passeport</option>
            </select>
        </div>

        <div class="controls">
            <b> <i class="material-icons">person</i> &nbsp;&nbsp; Cin Client: </b>
            <input placeholder="CIN" id="cin" type="text" name="cin" class="floatLabel">

        </div>

        <div class="grid">
            <button type="submit" value="Submit" class="col-1-4">Vérifier</button>
        </div>
    </div>

</form>

</body>
</html>