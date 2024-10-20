<?php

use Core\App;
use Http\Forms\Form;

$db = App::resolve(\Core\Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

if ((new \Core\Authenticator)->attempt($email, $password)) {
    redirect('/');
}

(new Form())->error('login', 'Email or Password is incorrect')->throw();