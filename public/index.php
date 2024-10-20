<?php

use Core\Router;

session_start();
const BASE_PATH = __DIR__."/../";
require BASE_PATH."vendor/autoload.php"; //replacer of spl_autoload_register

require BASE_PATH."Core/functions.php";

//spl_autoload_register(function ($class) {
//    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
//    require base_path("{$class}.php");
//});

require base_path("bootstrap.php");
$router = new Router();
require base_path("routes.php");
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method);
} catch (\Core\ValidationException $e) {
    \Core\Session::flash('errors', $e->errors);
    redirect($router->previousUrl());
}

\Core\Session::flush();