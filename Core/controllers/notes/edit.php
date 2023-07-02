<?php

use Core\App;
use Core\Database;

$userId = $_SESSION['user']['id'];

$db = App::resolve(Database::class);

// the note details
$note = $db->query('select * from notes where id = :id', [

    'id' => $_GET['id'],

])->findOrFail();


authorize($note['user_id'] === $userId);

view("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'note' => $note
]);