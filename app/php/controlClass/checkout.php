<?php
/**
 * Created by PhpStorm.
 * User: hamouda
 * Date: 07/05/2018
 * Time: 21:12
 */
require 'BDRequestManager.php';

$bdrm = BDRequestManager::getInstance();

if (isset($_POST['chambre'])) {
    $id = $bdrm->getSejourFromRoom($_POST['chambre']);
    $bdrm->unlinkDeadSejour($id);
    $bdrm->cleanFacture($id);
    $bdrm->deleteSejour($id);
    header("Location: /home");

} else {
    header("Location: /checkout");
}