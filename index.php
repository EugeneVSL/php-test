<?php

require ('functions.php');

$uri = $_SERVER['REQUEST_URI'];

switch ($uri) {

    case '/php-test/':
        require ('controllers/index.php');
        break;

    case '/php-test/about.php':
        require ('controllers/about.php');
        break;

    case '/php-test/contact.php':
        require ('controllers/contact.php');
        break;

    case '/php-test/our-mission.php':
        require ('controllers/our-mission.php');
        break;
        
    default:

        // query params and 404 for now
        
        break;
}
