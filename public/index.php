<?php

use Core\Session;
use Core\ValidationException;

require '../Core/functions.php';
require base_path('vendor/autoload.php');

session_start();

$router = new \Core\Router();
require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_METHOD'] ?? $_SERVER['REQUEST_METHOD'];


try {

    $router->route($uri, $method);

} catch (ValidationException $exception) {

    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    redirect($router->previousUrl());
}

// clear out flash session data
Session::unflash();