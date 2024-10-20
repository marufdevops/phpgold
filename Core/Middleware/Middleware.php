<?php

namespace Core\Middleware;

class Middleware
{
    public const MAP = [
        'auth' => Auth::class,
        'guest' => Guest::class,
    ];

    public static function resolve($key): void
    {
        if (!$key) {
            return;
        }
        $middleware = self::MAP[$key] ?? null;
        if (!$middleware) {
            throw new \Exception("Middleware not found for key {$key}");
        }
        (new $middleware)->handle();
    }
}