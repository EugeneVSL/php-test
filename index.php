<?php

require ('functions.php');

$uri = parse_url($_SERVER['REQUEST_URI']);

$routes = [

    '/php-test/' => 'controllers/index.php',
    '/php-test/about.php' => 'controllers/about.php',
    '/php-test/contact.php' => 'controllers/contact.php',
    '/php-test/our-mission.php' => 'controllers/our-mission.php'
];

if(array_key_exists($uri['path'], $routes)) {

    require $routes[$uri['path']];

} else {

    // code...
    // only 404 for now
}

