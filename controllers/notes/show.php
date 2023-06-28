<?php

use Core\Database;
use Core\Response;

// get the data
$configuration = require base_path('config.php');
$db = new Database($configuration['database']);

// hardcode the userID for now
$userId = 2;

if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['_METHOD'] === "DELETE") {


    // the note details
    $note = $db->query('select * from notes where id = :id', [

        'id' => $_POST['id'],

    ])->findOrFail();

    authorize($note['user_id'] === $userId);

    $db->query('delete from notes where id = :id', [
        'id' => $_POST['id']
    ]);

    header('location: /php-test/notes');
    exit();

} else {

    // the note details
    $note = $db->query('select * from notes where id = :id', [

        'id' => $_GET['id'],

    ])->findOrFail();

    authorize($note['user_id'] === $userId);

    // check the identity of the current user
    if($note['user_id'] !== $userId) {
        abort(Response::FORBIDDEN);
    }

    view("notes/show.view.php", [
        'heading' => 'Note',
        'note' => $note
    ]);
}
