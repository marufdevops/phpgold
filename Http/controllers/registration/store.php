<?php

use Core\App;
use Http\Forms\Form;

$db = App::resolve(\Core\Database::class);

$form = Form::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);


$user = $db->query("SELECT * FROM users WHERE email = ?", [$attributes['email']])->find();
if (!$user) {
    $password = password_hash($attributes['password'], PASSWORD_BCRYPT);
    $db->query("INSERT INTO users (email, password) VALUES (?, ?)", [$attributes['email'], $attributes['password']]);
    $_SESSION['user'] = [
        'email' => $email
    ];
}
redirect('/');