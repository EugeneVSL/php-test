<?php

require 'config.php';

// get the data
$configuration = require 'config.php';
$db = new Database($configuration['database']);

// the note details
$note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->fetch();

$heading = "Note";

require "views/note.view.php";
