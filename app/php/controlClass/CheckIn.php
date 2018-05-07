<?php
/**
 * Created by PhpStorm.
 * User: hamouda
 * Date: 07/05/2018
 * Time: 19:34
 */

require 'BDRequestManager.php';
$bdrm = BDRequestManager::getInstance();

if (isset($_POST['nom1'])) {


    $idsejour = $bdrm->createReservation($_GET['chambre'], $_GET['in'], $_GET['out']);
    $bdrm->setReservationToFalse($idsejour);

    $cone = $bdrm->addClientToBd($_POST['nom1'], $_POST['prenom1'], $_POST['phone1'], $_POST['email1'], $_POST['idtype1'], $_POST['idnumber1']);

    $bdrm->addClientToSejour($cone, $idsejour);

    if (isset($_POST['nom2'])) {
        $ctwo = $bdrm->addClientToBd($_POST['nom2'], $_POST['prenom2'], $_POST['phone2'], $_POST['email2'], $_POST['idtype2'], $_POST['idnumber2']);
        $bdrm->addClientToSejour($ctwo, $idsejour);
    }
}

header("Location: /home");