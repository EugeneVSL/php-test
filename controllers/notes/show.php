<?php

use Core\Database;
use Core\Response;

// hardcode it for now
$userId = 2;

// get the data
$configuration = require base_path('config.php');
$db = new Database($configuration['database']);

// the note details
$note = $db->query('select * from notes where id = :id', [

    'id' => $_GET['id'],

])->findOrFail();

authorize($note['user_id'] === $userId);

// check the identity of the current user
if ($note['user_id'] !== $userId) {
    abort(Response::FORBIDDEN);
}

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);