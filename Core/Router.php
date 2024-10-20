<?php

namespace Core;


use Core\Middleware\Middleware;

class Router
{
    protected array $routes = [];

    public function get($uri, $controller): self
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller): self
    {
        return $this->add('POST', $uri, $controller);
    }

    public function put($uri, $controller): self
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function delete($uri, $controller): self
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller): self
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function only($key): self
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    public function route($uri, $method): void
    {

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {

                Middleware::resolve($route['middleware']);
                require base_path('Http/controllers/'.$route['controller']);
                return;
            }
        }
        $this->abort(Response::NOT_FOUND);
    }

    public function previousUrl(): string
    {
        return $_SERVER['HTTP_REFERER'];
    }

    protected function add(string $method, string $uri, string $controller): self
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];
        return $this;
    }

    protected function abort($code = 404): void
    {
        http_response_code($code);
        require view("{$code}.view.php");
        die();
    }
}