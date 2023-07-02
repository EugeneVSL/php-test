<?php

use Core\App;
use Core\Database;

$heading = "My Notes";

$db = App::resolve(Database::class);

// get the notes for specific user
$notes = $db->query("select * from notes where user_id = :id", [
    'id' => $_SESSION['user']['id']
])->get();

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);
