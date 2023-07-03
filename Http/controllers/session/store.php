<?php

use Core\App;
use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

require base_path('Core/Validator.php');

$errors = [];

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {

    if ((new Authenticator)->attempt($email, $password)) {

        redirect('/php-test/');
    }

    $form->error('not-authenticated', 'No matching  for that email and password.');
}

Session::flash('errors', $form->errors());
redirect('/php-test/session');