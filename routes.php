<?php

$router->get('/php-test/', 'index.php');
$router->get('/php-test/about', 'about.php');
$router->get('/php-test/contact', 'contact.php');
$router->get('/php-test/our-mission', 'our-mission.php');


// get notes
$router->get('/php-test/notes', 'notes/index.php')->only('auth');


// nagivate to adding note
$router->get('/php-test/notes/create', 'notes/create.php');

// inserting note
$router->post('/php-test/notes', 'notes/store.php');

// show note
$router->get('/php-test/note', 'notes/show.php')->only('auth');

// navigate to editing note
$router->get('/php-test/note/edit', 'notes/edit.php')->only('auth');

// update note
$router->patch('/php-test/note/edit', 'notes/update.php')->only('auth');

// delete note
$router->post('/php-test/note/destroy', 'notes/destroy.php')->only('auth');




//user registration
$router->get('/php-test/register', 'registration/create.php')->only('guest');
$router->post('/php-test/register', 'registration/store.php');

// log in
$router->get('/php-test/session', 'session/create.php')->only('guest');
$router->post('/php-test/session', 'session/store.php')->only('guest');

$router->get('/php-test/logout', 'session/destroy.php')->only('auth');



