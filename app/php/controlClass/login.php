<?php
/**
 * Created by PhpStorm.
 * User: hamouda
 * Date: 19/04/2018
 * Time: 17:05
 */

    require 'BDRequestManager.php';
session_start();
    $bdrm = BDRequestManager::getInstance();

$reponse = $bdrm->checkAdmin($_POST['username'], $_POST['password']);//verification si le login correspend à un admin

if ($reponse) {

    $_SESSION['admin'] = true;
    $_SESSION['logged_in'] = true;
    $_SESSION["Prenom"] = "admin";

    header("Location: /home");
} else { // on verifie si le login correspend à un agent

    if($bdrm->checkAgentLogin($_POST['username'])){
        $response = $bdrm->checkAgent($_POST['username'],$_POST['password']);

        if ($response != null)  {

            $_SESSION['id'] = $response->AGENTID;
            $_SESSION['Nom'] = $response->LastName;
            $_SESSION['Prenom'] = $response->FirstName;
            $_SESSION['admin'] = false;


            $_SESSION['logged_in'] = true;

            header("Location: /home");
        }else{
            echo "ERROR !!  WRONG PASSWORD ";
        }
    } else {
        echo "Wrong LOGIN NAME !";
    }
}
