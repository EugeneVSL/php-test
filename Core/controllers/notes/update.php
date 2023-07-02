<?php

use Core\App;
use Core\Database;
use Core\Validator;

$userId = $_SESSION['user']['id'];

$db = App::resolve(Database::class);

// the note details
$note = $db->query('select * from notes where id = :id', [

    'id' => $_POST['id'],

])->findOrFail();

authorize($note['user_id'] === $userId);

$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

if(! empty($errors) ) {

    return view('notes/edit.view.php', [
        'heading' => "Edit Note",
        'note' => $note,
        'errors' => $errors
    ]);
}


$db->query('update notes set body = :body where id = :id', [

    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

header('location: /php-test/notes');
die();