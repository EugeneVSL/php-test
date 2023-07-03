<?php

namespace Core;

use Core\Database;

class Authenticator
{
    // protected $db = App::resolve(Database::class);

    protected $errors = [];

    public function attempt($user, $password)
    {
        // the note details
        $user = App::resolve(Database::class)->query('select * from users where email = :email', [

            'email' => $_POST['email']

        ])->find();

        if ($user) {

            if (password_verify($_POST['password'], $user['password'])) {
        
                // credentials match, start the session
                $this->login($user);

                return true;

            } else {

                $this->error('not-authenticated', 'No matching account found for that email and password.');
            } 
        }

        return false;
    }

        
    public function login($user) {

        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email']
        ];
    }

    public function logout() 
    {

        // set session to null
        $_SESSION = [];

        // destroy session
        session_destroy();

        $params = session_get_cookie_params();

        // delete any cookies created in the app
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], 
            $params['domain'], $params['secure'], $params['httponly']);
    }

    public function errors()
    {
        return $this->errors;
    }

    private function error($key, $message) {

        $this->errors[$key] = $message;
    }
}