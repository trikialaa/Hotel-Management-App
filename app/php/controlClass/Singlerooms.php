<?php
    require 'BDRequestManager.php';



    function getRooms(){
        $bdrm = BDRequestManager::getInstance();
        if (isset($_GET["refresh"]) && isset($_GET["date_in"]) && isset ($_GET["date_out"]) ) {
            $rooms = $bdrm->getOccupiedRooms();
        }
        return $rooms;
    }

    if(isset($_POST['submitcheckin'])){

        $bdrm = BDRequestManager::getInstance();
        $nom = $_POST['nom'];
        $cin = $_POST['cin'];
        $datearr = $_POST['datearr'];
        $datedep = $_POST['datedep'];

        $room = explode(" ", $_POST['roomnumberc'])[1];

        if(isset($nom) and isset($cin) and isset($room))
            echo $nom." ".$cin." ".$room;

    }
