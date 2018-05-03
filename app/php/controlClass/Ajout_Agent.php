<?php

require 'BDRequestManager.php';

$bdrm = BDRequestManager::getInstance();
$rslt = $bdrm->addAgent($_POST['prenom'], $_POST['nom'], $_POST['adresse'], $_POST['tel'], $_POST['login'], $_POST['password']);
if ($rslt != -1) {
    echo "ajouté avec succès ";
} else {
    echo "Agent non ajouté";
}