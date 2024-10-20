<?php

namespace Core;

class Container
{
    protected array $bindings = [];

    public function bind($key, $fn): void
    {
        $this->bindings[$key] = $fn;
    }

    public function resolve($key): mixed
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new \Exception("{$key} not found in container");
        }
        $resolver = $this->bindings[$key];
        return call_user_func($resolver);
    }
}