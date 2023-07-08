<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{

    protected $errors = [];

    public function __construct(public array $attributes)
    {

        if (! Validator::email($attributes['email'])) {
            $this->error('email', 'Please provide a valid the email.');
        }


        if (!Validator::string($attributes['password'], 7, 255)) {
            $this->error('password', 'Please provide a valid password.');
        }
    }

    public function throw() 
    {
        ValidationException::throw($this->errors(), $this->attributes);
    } 

    public static function validate($attributes)
    {

        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function failed() 
    {
        return count($this->errors);
    }

    public function error($key, $value) {

        $this->errors[$key] = $value;

        return $this;
    }

    public function errors()
    {
        return $this->errors;
    }
}