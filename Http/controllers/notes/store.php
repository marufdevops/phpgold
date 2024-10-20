<?php

use Core\Database;
use Core\Validator;

require base_path("Core/Validator.php");

$db = \Core\App::resolve(Database::class);

$errors = [];

if (Validator::isEmpty($_POST['title'])) {
    $errors['title'] = "The title is required";
}
if (Validator::isTooLong($_POST['title'], 255)) {
    $errors['title'] = "The title is too long";
}
if ($errors) {
    view("notes/create.view.php", [
        'header' => "Create Note",
        'errors' => $errors
    ]);
}
$query = "INSERT INTO notes (title, user_id) VALUES (?, ?)";
$db->query($query, [$_POST['title'], 1]);

header("Location: /notes");