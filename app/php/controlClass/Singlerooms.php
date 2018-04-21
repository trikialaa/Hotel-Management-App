<?php
    require 'BDRequestManager.php';


    function getRooms(){
        $bdrm = BDRequestManager::getInstance();

        if (isset($_GET["refresh"]) && isset($_GET["date_in"]) && isset ($_GET["date_out"]) ) {
            $rooms = $bdrm->getOccupiedRooms();
        }
        return $rooms;
    }
