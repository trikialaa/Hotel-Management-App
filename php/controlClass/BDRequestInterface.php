<?php
/**
 * Created by PhpStorm.
 * User: hamouda
 * Date: 15/04/2018
 * Time: 13:20
 */

        require 'BDRequestManager.php';


        function showClientInRow($bdrm){

            $b = $bdrm->getAllClients();
            Client::startTable();
            foreach ($b as $value) {
                echo $value->showInRow();
            }
            Client::endTable();
        }

        echo "helloFromBDInterface<br>";

        $bdrm = BDRequestManager::getInstance();

        showClientInRow($bdrm);

