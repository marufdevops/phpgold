<?php


$db = \Core\App::resolve('Core\Database');

$query = "SELECT * FROM notes";

$notes = $db->query($query)->get();

view("notes/index.view.php", [
    'header' => "Notes",
    'notes' => $notes
]);