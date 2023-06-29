<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

$container->bind('Core\Database', function () {

    $configuration = require base_path('config.php');
    return new Database($configuration['database']);

});

App::setContainer($container);
