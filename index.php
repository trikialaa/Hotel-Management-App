<?php
// Grabs the URI and breaks it apart in case we have querystring stuff
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

// Route it up!
switch ($request_uri[0]) {
    // Home page

    case '/home':
        require 'app/views/home.php';
        break;

    case '/login':
    require 'app/views/login.php';
    break;

    case '/reservation':
        require 'app/views/Reservation.php';
        break;

    case '/singlerooms':
        require 'app/views/Singlerooms.php';
        break;
    case '/elfac':
        require 'app/php/controlClass/elementfacturetab.php';
        break;
    case '/checkin':
        require 'app/views/CheckInForm.php';
        break;
    case '/checkcin':
        require 'app/views/CheckCIN.php';
        break;
    case '/consomation':
        require 'app/views/consommation.php';
        break;

    default:
        header('HTTP/1.0 404 Not Found');
        require 'app/views/404.php';
        break;
}