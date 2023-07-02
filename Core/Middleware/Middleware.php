<?php

namespace Core\Middleware;

use Exception;

class Middleware 
{
    const MAP = [

        "guest" => Guest::class,
        "auth" => Auth::class
    ];

    public static function resolve($key)
    {
        if (! $key) {

            return;
        }

        $middleware = Middleware::MAP[$key] ?? false;

        if(! $middleware) {

            throw new Exception("Middleware not identified for key $key.");
        }

        (new $middleware)->handle();
    }
}