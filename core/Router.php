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
            // Check if route matches and method matches
            if ($this->matchRoute($route['uri'], $uri) && strtoupper($route['method']) === $requestMethod) {
                // Extract parameters from URI
                $this->extractParams($route['uri'], $uri);
                require basePath($route['controller']);
                return;
            }
        }

        abort(404);
    }

    protected function matchRoute($routeUri, $requestUri)
    {
        // Convert route pattern to regex
        $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([^/]+)', $routeUri);
        $pattern = '#^' . $pattern . '$#';

        return preg_match($pattern, $requestUri);
    }

    protected function extractParams($routeUri, $requestUri)
    {
        // Extract parameter names from route pattern
        preg_match_all('/\{([a-zA-Z0-9_]+)\}/', $routeUri, $paramNames);
        
        // Convert route pattern to regex to extract values
        $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([^/]+)', $routeUri);
        $pattern = '#^' . $pattern . '$#';
        
        // Extract parameter values from request URI
        preg_match($pattern, $requestUri, $matches);
        
        // Remove the full match (index 0)
        array_shift($matches);
        
        // Map parameter names to values and add to $_GET
        foreach ($paramNames[1] as $index => $paramName) {
            if (isset($matches[$index])) {
                $_GET[$paramName] = $matches[$index];
            }
        }
    }
}


