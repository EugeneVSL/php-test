<?php

use Core\Database;
use Core\Response;

// get the data
$configuration = require base_path('config.php');
$db = new Database($configuration['database']);

// hardcode the userID for now
$userId = 2;

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