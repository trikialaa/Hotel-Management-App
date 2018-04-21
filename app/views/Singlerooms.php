<?php
require 'app/php/controlClass/BDRequestManager.php';
$bdrm = BDRequestManager::getInstance();
if (isset($_GET["refresh"]) && isset($_GET["date_in"]) && isset ($_GET["date_out"]) ) {
    $rooms = $bdrm->getOccupiedRooms();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>single rooms</title>
    <link rel="stylesheet" type="text/css" href="app/css/table.css">
    <script>
        var rooms_js=<?php echo json_encode($rooms); ?>;
    </script>
</head>
<body>

<div id="parentpage">

    <form method="get"> <div id="dates">
        <input placeholder="Check-in date" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date_in" name ="date_in">

        <input placeholder="Check-out date" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date_out" name="date_out">

        <input type="submit" onclick='' value="Rafraichir" name ="refresh"/>


          </div>
    </form>



    <table align="center" id="tblMain" border="1">
        <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
        </tr>
        <tr>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
        </tr>
        <tr>
            <td>9</td>
            <td>10</td>
            <td>11</td>
            <td>12</td>
        </tr>
        <tr>
            <td>13</td>
            <td>14</td>
            <td>15</td>
            <td>16</td>
        </tr>

    </table>

    <dialog id="reservation_dialogue">
        <form id="resform">
            <input type="date" placeholder="date d'arrivée">
            <input type="date" placeholder="date de départ">
            <button type="submit">confirmer</button>
            <button type="reset" onclick="annulerreservation()">annuler</button>
        </form>
    </dialog>

    <dialog id="checkin_dialogue">
        <form id="checkinform">
            <input type="text" placeholder="nom">
            <input type="text" placeholder="cin">
            <input type="date" placeholder="date d'arrivée">
            <input type="date" placeholder="date de départ">
            <button type="submit">confirmer</button>
            <button type="reset" onclick="annulercheckin()">annuler</button>
        </form>
    </dialog>
</div>
</body>
<script src="app/js/table.js"></script>

</html>