<?php

require 'BDRequestManager.php';

$bdrm = BDRequestManager::getInstance();
if (isset($_POST['submit'])) {
    $rst = $bdrm->addClientToBdForReservation($_POST['nom'], $_POST['prenom'], $_POST['idtype'], $_POST['idnumber']);
    $response = $bdrm->createReservation($_POST['roomnumber'], $_POST['datearr'], $_POST['datedepp']);



}

?>