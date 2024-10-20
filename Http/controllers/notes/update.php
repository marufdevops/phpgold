<?php

use Core\Database;
use Core\Validator;

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
$query = "UPDATE notes SET title = ? WHERE id = ?";
$db->query($query, [$_POST['title'], $_POST['id']]);
header("Location: /note?id=".$_POST['id']);
die();