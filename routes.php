<?php

$router->get('/php-test/', 'controllers/index.php');
$router->get('/php-test/about', 'controllers/about.php');
$router->get('/php-test/notes', 'controllers/notes/index.php');

$router->get('/php-test/note', 'controllers/notes/show.php');
$router->delete('/php-test/note', 'controllers/notes/destroy.php');

$router->get('/php-test/contact', 'controllers/contact.php');

$router->get('/php-test/notes/create', 'controllers/notes/create.php');
$router->post('/php-test/notes/create', 'controllers/notes/create.php');

$router->get('/php-test/our-mission', 'controllers/our-mission.php');
