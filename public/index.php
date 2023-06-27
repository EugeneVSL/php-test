<?php

require '../Core/functions.php';
require base_path('config.php');
require base_path('Core/Response.php');

spl_autoload_register(function($class) {

    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});

require base_path('Core/router.php');