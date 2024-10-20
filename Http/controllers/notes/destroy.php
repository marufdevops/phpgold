<?php

use Core\Database;


$db = \Core\App::resolve(Database::class);

$currentUserId = 1;

$query = "SELECT * FROM notes where id = ?";

$note = $db->query($query, [$_GET['id']])->findOrFail();

authorize($note['user_id'] !== $currentUserId);

$query = "DELETE FROM notes where id = ?";
$db->query($query, [$_POST['id']]);
header("Location: /notes");
die();