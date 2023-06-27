<?php

// get the data
$configuration = require base_path('config.php');
$db = new Database($configuration['database']);

$heading = "My Notes";

// get the notes for specific user
$notes = $db->query("select * from notes where user_id = 2")->get();

require view("notes/index.view.php");
