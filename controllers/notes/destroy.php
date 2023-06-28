<?php

use Core\Database;

// hardcode it for now
$userId = 2;

// get the data
$configuration = require base_path('config.php');
$db = new Database($configuration['database']);

// the note details
$note = $db->query('select * from notes where id = :id', [

    'id' => $_POST['id'],

])->findOrFail();

authorize($note['user_id'] === $userId);

$db->query('delete from notes where id = :id', [

    'id' => $_POST['id']
]);

header('location: /php-test/notes');
die();