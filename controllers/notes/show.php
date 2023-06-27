<?php

use Core\Database;
use Core\Response;

// get the data
$configuration = require base_path('config.php');
$db = new Database($configuration['database']);

// the note details
$note = $db->query('select * from notes where id = :id', [

    'id' => $_GET['id'],

])->findOrFail();

// hardcode the userID for now
$userId = 2;

authorize($note['user_id'] === $userId);

// check the identity of the current user
if($note['user_id'] !== $userId) {
    abort(Response::FORBIDDEN);
}

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);
