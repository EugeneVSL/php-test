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

function loadEnvironmnetVariables() {

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}

