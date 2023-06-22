<?php

require 'config.php';

// get the data
$configuration = require 'config.php';
$db = new Database($configuration['database']);

$heading = "My Notes";

// get the notes for specific user
$notes = $db->query("select * from notes where user_id = 2")->fetchAll();

require "views/notes.view.php";
