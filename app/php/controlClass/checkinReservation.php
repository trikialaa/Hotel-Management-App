<?php
/**
 * Created by PhpStorm.
 * User: hamouda
 * Date: 07/05/2018
 * Time: 16:42
 */
require 'BDRequestManager.php';
$bdrm = BDRequestManager::getInstance();

if (isset($_GET['sejour'])) {

    $bdrm->setReservationToFalse($_GET['sejour']);
}

if (isset($_POST['nom'])) {
    $res = $bdrm->addClientToBd($_POST['nom'], $_POST['prenom'], $_POST['phone'], $_POST['email'], $_POST['idtype'], $_POST['idnumber']);
    $bdrm->addClientToSejour($res, $_GET['sejour']);
}

header("Location: /home");