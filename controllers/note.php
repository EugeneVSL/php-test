<?php

require 'config.php';

// get the data
$configuration = require 'config.php';
$db = new Database($configuration['database']);

$heading = "Note";

// the note details
$note = $db->query('select * from notes where id = :id', [

        'id' => $_GET['id'],

])->fetch();

if (! $note) {
    abort();
}

// hardcoded userID for now
$userId = 2;

// check the identity of the current user
if($note['user_id'] !== $userId) {
    abort(Response::FORBIDDEN);
}

require "views/note.view.php";
