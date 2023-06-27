<?php

use Core\Database;

$heading = "My Notes";

// get the data
$configuration = require base_path('config.php');
$db = new Database($configuration['database']);

// get the notes for specific user
$notes = $db->query("select * from notes where user_id = 2")->get();

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);
