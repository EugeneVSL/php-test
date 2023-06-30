<?php

use Core\App;
use Core\Database;
use Core\Validator;

require base_path('Core/Validator.php');

$errors = [];

if (!Validator::email($_POST['email'])) {
    $errors['email'] = 'Please provide a valid email address.';
}


if (!Validator::string($_POST['password'], 7, 255)) {
    $errors['password'] = 'Please provide a password of at least 7 characters.';
}


if(! empty($errors)) {

    return view("registration/create.view.php", [
        'heading' => 'Create New User',
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);

// the note details
$user = $db->query('select * from users where email = :email', [

    'email' => $_POST['email'],

])->find();


if($user) {

    $errors["existing-user"] = "This email already exists";

    return view("registration/create.view.php", [
        'heading' => 'Create New User',
        'errors' => $errors
    ]);

} else {

    // create the user
    $db->query('INSERT INTO users(email, password) VALUE(:email, :password)', [
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ]);

    $_SESSION['user'] = $_POST['email'];

    header('location: /php-test');
    exit();
}