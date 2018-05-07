<?php

        $request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
        switch ($request_uri[0]) {
            case '/':
            case '/home':
                require 'app/views/home.php';
                break;
            case '/login':
                require 'app/views/login.php';
                break;
            case '/reservation':
                require 'app/views/Reservation.php';
                break;
            case '/confirmerReservation':
                require 'app/views/confirmerReservation.php';
                break;
            case '/facture':
                require 'app/views/facture.php';
                break;
            case '/roomstate':
                require 'app/views/roomstate.php';
                break;
            case '/CheckInResForm':
                require 'app/views/CheckInResForm.php';
                break;
            case '/CheckIn':
                require 'app/views/CheckIn.php';
                break;

            case '/consomation':
                require 'app/views/consommation.php';
                break;
            case '/ajouteragent':
                require 'app/views/ajouteragent.php';
                break;

            default:
                header('HTTP/1.0 404 Not Found');
                require 'app/views/404.php';
                break;
        }