<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Http\Forms\LoginForm;

require base_path('Core/Validator.php');


$email = $_POST['email'];
$password = $_POST['password'];

$db = App::resolve(Database::class);

$form = new LoginForm();

if (! $form->validate($email, $password)) {

    return view("session/create.view.php", [
        'heading' => 'Sign In',
        'errors' => $form->errors()
    ]);
}

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