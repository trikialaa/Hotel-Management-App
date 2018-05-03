<?php

require 'BDRequestManager.php';

$bdrm = BDRequestManager::getInstance();

if (isset($_POST['datedepp']) && isset($_POST['datearr']) && isset($_POST['idnumber'])) {
    $rst = $bdrm->addClientToBdForReservation($_POST['nom'], $_POST['prenom'], $_POST['idtype'], $_POST['idnumber']);
    $response = $bdrm->createReservation($_POST['roomnumber'], $_POST['datearr'], $_POST['datedepp']);

} else {
    echo "ERROR INSERTING ELEMENTS IN DATABASE";
}

header("Location: localhost:3000/home");

exit;

