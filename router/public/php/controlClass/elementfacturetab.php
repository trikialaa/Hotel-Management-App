<?php
/**
 * Created by PhpStorm.
 * User: hamouda
 * Date: 19/04/2018
 * Time: 21:10
 */

    require 'BDRequestManager.php';


    $bdrm = BDRequestManager::getInstance();

    $elementlist = $bdrm->getElementFactureByType("mekla");

    ElementFacture::printArray($elementlist);