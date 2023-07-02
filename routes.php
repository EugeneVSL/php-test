<?php

$router->get('/php-test/', 'core/controllers/index.php');
$router->get('/php-test/about', 'core/controllers/about.php');
$router->get('/php-test/contact', 'core/controllers/contact.php');
$router->get('/php-test/our-mission', 'core/controllers/our-mission.php');


// get notes
$router->get('/php-test/notes', 'core/controllers/notes/index.php')->only('auth');


// nagivate to adding note
$router->get('/php-test/notes/create', 'core/controllers/notes/create.php');

// inserting note
$router->post('/php-test/notes', 'core/controllers/notes/store.php');

// show note
$router->get('/php-test/note', 'core/controllers/notes/show.php')->only('auth');

// navigate to editing note
$router->get('/php-test/note/edit', 'core/controllers/notes/edit.php')->only('auth');

// update note
$router->patch('/php-test/note/edit', 'core/controllers/notes/update.php')->only('auth');

// delete note
$router->post('/php-test/note/destroy', 'core/controllers/notes/destroy.php')->only('auth');




//user registration
$router->get('/php-test/register', 'core/controllers/registration/create.php')->only('guest');
$router->post('/php-test/register', 'core/controllers/registration/store.php');

// log in
$router->get('/php-test/session', 'core/controllers/session/create.php')->only('guest');
$router->post('/php-test/session', 'core/controllers/session/store.php')->only('guest');

$router->get('/php-test/logout', 'core/controllers/session/destroy.php')->only('auth');



