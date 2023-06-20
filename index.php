<?php

require 'functions.php';
// require 'router.php';

$dsn = "mysql:host=localhost;port=3306;dbname=php-test;charset=utf8mb4";
$usr = "php-test-usr";
$pwd = "GMn^7Vme0qY8";

$pdo = new PDO($dsn, $usr, $pwd);
$statement = $pdo->prepare("select * from posts where id = :id");
$statement->execute(['id' => 1]);
$post = $statement->fetch(PDO::FETCH_ASSOC);

echo "<li>" . $post['title'] . "</li>";




