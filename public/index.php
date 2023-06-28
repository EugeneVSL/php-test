<?php

require '../Core/functions.php';
require base_path('config.php');
require base_path('Core/Response.php');

spl_autoload_register(function($class) {

    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});

// hardcode it for now
$userId = 2;

$router = new \Core\Router();
require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_METHOD'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
