<?php

use Core\Database;


$db = \Core\App::resolve(Database::class);
$currentUserId = 1;

$query = "SELECT * FROM notes where id = ?";

$note = $db->query($query, [$_GET['id']])->findOrFail();

$currentUserId = 1;

authorize($note['user_id'] !== $currentUserId);

view("notes/show.view.php", [
    'header' => "Note#".$_GET['id'],
    'note' => $note
]);