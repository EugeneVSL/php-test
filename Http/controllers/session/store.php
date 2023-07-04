<?php

use Core\App;
use Core\Authenticator;
use Core\Session;
use Core\ValidationException;
use Http\Forms\LoginForm;

require base_path('Core/Validator.php');

$errors = [];

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'], 
    'password' => $_POST['password']
]);

$signedIn = (new Authenticator)->attempt(
    $attributes['email'], $attributes['password']);

if (! $signedIn) {

    $form->error(
        'not-authenticated', 'No matching for that email and password.'
    )->throw();
}

redirect('/php-test/');