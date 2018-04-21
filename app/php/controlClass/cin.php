<?php
/**
 * Created by PhpStorm.
 * User: myriam
 * Date: 19/04/2018
 * Time: 20:25
 */

    require 'BDRequestManager.php';

    $bdrm = BDRequestManager::getInstance();

    $response = $bdrm->isClientInBd("CIN",$_POST['cin']);

    if ($response >=0 )  {
        echo "AVAILABLE" ;
    }else{
        echo "NOT AVAILBALBE";
    }


