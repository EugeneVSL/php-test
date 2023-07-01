<?php

$router->get('/php-test/', 'controllers/index.php');
$router->get('/php-test/about', 'controllers/about.php');
$router->get('/php-test/contact', 'controllers/contact.php');
$router->get('/php-test/our-mission', 'controllers/our-mission.php');


// get notes
$router->get('/php-test/notes', 'controllers/notes/index.php')->only('auth');


// nagivate to adding note
$router->get('/php-test/notes/create', 'controllers/notes/create.php');

// inserting note
$router->post('/php-test/notes', 'controllers/notes/store.php');

// show note
$router->get('/php-test/note', 'controllers/notes/show.php');

// navigate to editing note
$router->get('/php-test/note/edit', 'controllers/notes/edit.php');

// update note
$router->patch('/php-test/note/edit', 'controllers/notes/update.php');

// delete note
$router->post('/php-test/note/destroy', 'controllers/notes/destroy.php');




//user registration
$router->get('/php-test/register', 'controllers/registration/create.php')->only('guest');
$router->post('/php-test/register', 'controllers/registration/store.php');

// log in
$router->get('/php-test/session', 'controllers/session/create.php')->only('guest');
$router->post('/php-test/session', 'controllers/session/store.php')->only('guest');

$router->get('/php-test/logout', 'controllers/session/destroy.php')->only('auth');



