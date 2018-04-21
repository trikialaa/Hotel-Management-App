<?php
/**
 * Created by PhpStorm.
 * User: myriam
 * Date: 19/04/2018
 * Time: 20:25
 */

    require 'BDRequestManager.php';

    $bdrm = BDRequestManager::getInstance();

    $response = $bdrm->checkClientCIN($_POST['cin']);

    if ($response)  {

        echo "AVAILABLE" ;

    }else{
        echo "NOT AVAILBALBE";
    }


