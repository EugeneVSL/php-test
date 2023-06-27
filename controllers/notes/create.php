<?php

require 'Validator.php';

// get the data
$configuration = require 'config.php';
$db = new Database($configuration['database']);

$heading = "Create Note";

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];

    if(! Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A body of no more than 1,000 characters is required.';
    }

    if(empty($errors)) {

        $db->query('INSERT INTO notes(body, user_id) VALUE(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 2 // hardcode it for now
        ]);
    }
}

require "views/notes/create.view.php";