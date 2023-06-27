<?php

$routes = require 'routes.php';

function abort($statusCode = 404) {

    // only 404 for now
    http_response_code($statusCode);
    require "views/{$statusCode}.php";
    die();
}

function routeToController($routes, $uri) {

    

    if(array_key_exists($uri['path'], $routes)) {

        require $routes[$uri['path']];
    
    } else {
    
        abort();
    }
}

$uri = parse_url($_SERVER['REQUEST_URI']);

routeToController($routes, $uri);
