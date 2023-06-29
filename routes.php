<?php

$router->get('/php-test/', 'controllers/index.php');
$router->get('/php-test/about', 'controllers/about.php');
$router->get('/php-test/contact', 'controllers/contact.php');
$router->get('/php-test/our-mission', 'controllers/our-mission.php');



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
$router->delete('/php-test/note', 'controllers/notes/destroy.php');



// get notes
$router->get('/php-test/notes', 'controllers/notes/index.php');
