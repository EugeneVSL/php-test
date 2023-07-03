<?php

use Core\App;
use Core\Authenticator;
use Http\Forms\LoginForm;

require base_path('Core/Validator.php');

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {

    if ((new Authenticator)->attempt($email, $password)) {

        redirect('/php-test/');
    }

    // collect any errors from authenticator 
    array_push($errors, $auth->errors());
}

// collect any errors from validator 
array_push($errors, $form->errors());
    
// if the code reaches this point, there are errors so we redirect  
// the user to the log in page and display the errors  
return view("session/create.view.php", [

    'heading' => 'Sign In',
    'errors' => $errors
]);