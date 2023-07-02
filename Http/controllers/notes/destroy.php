<?php

use Core\App;
use Core\Database;

// hardcode it for now
$userId = $_SESSION['user']['id'];

dd("Here");

// $db = App::resolve(Database::class);

// // the note details
// $note = $db->query('select * from notes where id = :id', [

//     'id' => $_POST['id'],

// ])->findOrFail();

// authorize($note['user_id'] === $userId);

// $db->query('delete from notes where id = :id', [

//     'id' => $_POST['id']
// ]);

// header('location: /php-test/notes');
// die();