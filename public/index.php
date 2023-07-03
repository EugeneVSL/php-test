<?php

use Core\Session;

session_start();

require '../Core/functions.php';
require base_path('config.php');
require base_path('Core/Response.php');
require base_path('Core/Container.php');
require base_path('Core/Database.php');
require base_path('Core/App.php');

require base_path('bootstrap.php');

spl_autoload_register(function($class) {

    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});

$router = new \Core\Router();
require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_METHOD'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

// clear out flash session data
Session::unflash();