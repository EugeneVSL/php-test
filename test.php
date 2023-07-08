<?php

use PDO;

$username = 'php-test-usr';
$password = 'GMn^7Vme0qY8';
$dsn = "mysql:host=localhost;dbname=php-test";
$db = new PDO($dsn, $username, $password);

$_POST['id'] = 1;


// Add this book to the database
$title = 'Invisible Man';
$author = 'Ralph Ellison';
$year = 1953;

// Place your INSERT statement here
$newBookQuery = $db->prepare('INSERT INTO books (title, author, year) VALUES (:title, :author, :year)');

// Execute it here
$newBookQuery->execute([
  'title' => $title,
  'author' => $author,
  'year' => $year,
]);