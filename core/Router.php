<?php

namespace core;

class Router
{
    protected $routes = [];

    public function get($uri, $controller)
    {
        $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        $this->add('PUT', $uri, $controller);
    }

    protected function add($method, $uri, $controller)
    {
        $this->routes[] = compact('method', 'uri', 'controller');
    }

    public function route($uri, $requestMethod)
    {
        $requestMethod = strtoupper($requestMethod);

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && strtoupper($route['method']) === $requestMethod) {
                require basePath($route['controller']);
                return;
            }
        }

        abort(404);
    }
}

