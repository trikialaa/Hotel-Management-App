<?php

require 'BDRequestManager.php';

$bdrm = BDRequestManager::getInstance();

if (isset($_POST['datedepp']) && isset($_POST['datearr']) && isset($_POST['idnumber'])) {

    $rst = $bdrm->addClientToBd($_POST['nom'], $_POST['prenom'], $_POST['phone'], $_POST['email'], $_POST['idtype'], $_POST['idnumber']);
    $response = $bdrm->createReservation($_POST['roomnumber'], $_POST['datearr'], $_POST['datedepp']);
    $bdrm->addClientToSejour($rst, $response);

} else {
    echo "ERROR INSERTING ELEMENTS IN DATABASE";
}

header("Location: /home");

exit;

