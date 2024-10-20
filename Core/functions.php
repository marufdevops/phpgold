<?php

use Core\Response;

function dd($value): void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function urlIs(string $value): bool
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function authorize(bool $condition): void
{
    if ($condition) {
        abort(Response::FORBIDDEN);
    }
}

function base_path(string $path): string
{
    return BASE_PATH.$path;
}

function view(string $path, array $attributes = []): void
{
    extract($attributes);
    require base_path("views/{$path}");
}

function abort($code = 404): void
{
    http_response_code($code);
    require view("{$code}.view.php");
    die();
}

function redirect($path): void
{
    header("Location: {$path}");
    exit();
}