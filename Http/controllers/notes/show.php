<?php

use Core\App;
use Core\Database;
use Core\Response;

$db = App::resolve(Database::class);

$userId = $_SESSION['user']['id'];

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