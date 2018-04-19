<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>single rooms</title>
    <link rel="stylesheet" type="text/css" href="css/table.css">
</head>
<body>

<div id="parentpage">
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
<script src="js/table.js"></script>

</html>