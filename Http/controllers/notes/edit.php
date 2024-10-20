<?php

use Core\Database;

require base_path("Core/Validator.php");

$db = \Core\App::resolve(Database::class);
$currentUserId = 1;

$query = "SELECT * FROM notes where id = ?";

$note = $db->query($query, [$_GET['id']])->findOrFail();

$currentUserId = 1;

authorize($note['user_id'] !== $currentUserId);

view("notes/edit.view.php", [
    'header' => "Edit Note",
    'note' => $note,
    'errors' => []
]);