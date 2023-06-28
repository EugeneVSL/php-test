<?php

use Core\Database;
use Core\Validator;

require base_path('Core/Validator.php');

// get the data
$configuration = require base_path('config.php');
$db = new Database($configuration['database']);

$errors = [];

// hardcode it for now
$userId = 2;

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

if(! empty($errors)) {

    return view('notes/create.view.php', [
        'heading' => "Create Note",
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO notes(body, user_id) VALUE(:body, :user_id)', [
    'body' => $_POST['body'],
    'user_id' => $userId
]);

header('location: /php-test/notes');
die();


