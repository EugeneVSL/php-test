<?php

namespace Http\Forms;
use Core\Validator;

class LoginForm
{

    protected $errors = [];

    public function validate($email, $password)
    {

        if (! Validator::email($email)) {
            $this->error('email', 'Please provide a valid the email.');
        }


        if (!Validator::string($password, 7, 255)) {
            $this->error('password', 'Please provide a valid password.');
        }

        return empty($this->errors);
    }

    public function error($key, $value) {

        $this->errors[$key] = $value;
    }

    public function errors()
    {
        return $this->errors;
    }
}