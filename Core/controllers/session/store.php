<?php

use Core\App;
use Core\Database;
use Core\Validator;

require base_path('Core/Validator.php');

$errors = [];

if (! Validator::email($_POST['email'])) {
    $errors['email'] = 'Please provide a valid the email.';
}


if (!Validator::string($_POST['password'], 7, 255)) {
    $errors['password'] = 'Please provide a valid password.';
}


if (! empty($errors)) {

    return view("session/create.view.php", [
        'heading' => 'Sign In',
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);

// the note details
$user = $db->query('select * from users where email = :email', [

    'email' => $_POST['email']

])->find();


if ($user) {

    if (password_verify($_POST['password'], $user['password'])) {

        // credentials match, start the session
        login($user);

        header('location: /php-test/');
        exit();

    } else {

        $errors['not-authenticated'] = "User was not authenticated succesfuly.";
    }

} else  {

    $errors['no-account'] = 'No matching account for this email.';
}

return view("session/create.view.php", [
    'heading' => 'Sign In',
    'errors' => $errors
]);