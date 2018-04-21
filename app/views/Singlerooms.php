
<?php require 'app/php/controlClass/Singlerooms.php';?>

    <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>single rooms</title>
            <link rel="stylesheet" type="text/css" href="app/css/table.css">
            <link rel="stylesheet" type="text/css" href="app/css/modalForm.css">
            <script>
                var rooms_js=<?php echo json_encode(getRooms()); ?>;
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

            <div id="reservation_dialogue" class="modal">

                <div class="modal-content">
                    <span id="spanclose" class="close">&times;</span>

                    <form id="resform" method="post">
                        <input type="date" placeholder="date d'arrivée">
                        <input type="date" placeholder="date de départ">
                        <button type="submit" name="submitres"  >confirmer</button>
                        <button type="reset" onclick="annulerreservation()">annuler</button>
                    </form>

                </div>

            </div>
            <?php if(isset($message)) echo $message;?>

            <div id="checkin_dialogue" class="modal">
                <div class="modal-content">
                    <span id="spanclose2" class="close">&times;</span>
                    <form id="checkinform" method="post">
                        <input type="text" placeholder="nom" name="nom">
                        <input type="text" placeholder="cin" name="cin">
                        <input type="date" placeholder="date d'arrivée" name ="datearr">
                        <input type="date" placeholder="date de départ" name="datedep">

                        <input type='hidden' id="roomnumberc" name="roomnumberc" value=""/>

                        <button type="submit" name="submitcheckin" >confirmer</button>
                        <button type="reset" onclick="annulercheckin()">annuler</button>
                    </form>
                </div>
            </div>
        </div>
        </body>
        <script src="app/js/table.js"></script>

        </html>