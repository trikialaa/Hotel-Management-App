<?php

require 'BDRequestManager.php';

$bdrm = BDRequestManager::getInstance();

if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['tel']) && isset($_POST['login']) && isset($_POST['mdp'])) {

    $rslt = $bdrm->addAgent($_POST['prenom'], $_POST['nom'], $_POST['adresse'], $_POST['tel'], $_POST['login'], $_POST['mdp']);
    if ($rslt != -1) {
        header("Location: /home");
    } else {
        header("Location: /ajouteragent");
    }
}