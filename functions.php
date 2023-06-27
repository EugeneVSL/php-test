<?php

function dd($value) {

    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function urlIs($value) {

    return $_SERVER['REQUEST_URI'] === $value;
}

function authorize($condition, $status = Response::FORBIDDEN) {

    if(! $condition) {

        abort($status);
    }
}

function base_path($path) {

    return dirname(__DIR__) . '/php-test/' . $path;
}

function view($path, $attributes = null) {

    if(is_array($attributes)) {

        extract($attributes);
    }

    require base_path('/views/') . $path;
}

