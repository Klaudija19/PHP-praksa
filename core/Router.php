<?php

namespace core;

use core\middleware\Middleware;

class Router
{
    protected $routes = [];
    protected $currentMiddleware = null;

    public function get($uri, $controller, $middleware = null)
    {
        return $this->add('GET', $uri, $controller, $middleware);
    }

    public function post($uri, $controller, $middleware = null)
    {
        return $this->add('POST', $uri, $controller, $middleware);
    }

    public function delete($uri, $controller, $middleware = null)
    {
        return $this->add('DELETE', $uri, $controller, $middleware);
    }

    public function patch($uri, $controller, $middleware = null)
    {
        return $this->add('PATCH', $uri, $controller, $middleware);
    }

    public function put($uri, $controller, $middleware = null)
    {
        return $this->add('PUT', $uri, $controller, $middleware);
    }

    /**
     * Додава рута
     */
    protected function add($method, $uri, $controller, $middleware = null)
    {
        $this->routes[] = [
            'method'     => $method,
            'uri'        => $uri,
            'controller' => $controller,
            'middleware' => $middleware ?? $this->currentMiddleware // може да е string или array
        ];

        $this->currentMiddleware = null; // reset после користење

        return $this;
    }

    /**
     * Додава middleware за следната рута
     */
    public function only($middleware)
    {
        $this->currentMiddleware = $middleware;
        return $this;
    }

    /**
     * Рутинг
     */
    public function route($uri, $requestMethod)
    {
        $requestMethod = strtoupper($requestMethod);

        foreach ($this->routes as $route) {

            if ($this->matchRoute($route['uri'], $uri)
                && strtoupper($route['method']) === $requestMethod) {

                // Params
                $this->extractParams($route['uri'], $uri);

                // Middleware
                if ($route['middleware']) {
                    if (is_array($route['middleware'])) {
                        foreach ($route['middleware'] as $mw) {
                            Middleware::resolve($mw);
                        }
                    } else {
                        Middleware::resolve($route['middleware']);
                    }
                }

                // Load controller - try multiple methods in order
                $controllerPath = null;
                $triedPaths = [];
                
                // Method 1: Try using basePath() helper function (preferred)
                if (function_exists('basePath')) {
                    $tryPath = basePath($route['controller']);
                    $triedPaths[] = $tryPath;
                    if (file_exists($tryPath)) {
                        $controllerPath = $tryPath;
                    }
                }
                
                // Method 2: Try using BASE_PATH constant directly
                if (!$controllerPath && defined('BASE_PATH')) {
                    $tryPath = rtrim(BASE_PATH, '/\\') . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $route['controller']);
                    $triedPaths[] = $tryPath;
                    if (file_exists($tryPath)) {
                        $controllerPath = $tryPath;
                    }
                }
                
                // Method 3: Try relative path from Router's location (core/)
                if (!$controllerPath) {
                    $tryPath = dirname(__DIR__) . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $route['controller']);
                    $triedPaths[] = $tryPath;
                    if (file_exists($tryPath)) {
                        $controllerPath = $tryPath;
                    }
                }
                
                // Load the controller
                if ($controllerPath && file_exists($controllerPath)) {
                    require $controllerPath;
                    return;
                }
                
                // If all methods failed, show detailed error
                $debugInfo = "Router Error: Controller not found\n";
                $debugInfo .= "  Route URI: {$route['uri']}\n";
                $debugInfo .= "  Method: {$requestMethod}\n";
                $debugInfo .= "  Controller path in routes: {$route['controller']}\n";
                $debugInfo .= "  Tried paths:\n";
                foreach ($triedPaths as $idx => $path) {
                    $debugInfo .= "    " . ($idx + 1) . ". {$path} " . (file_exists($path) ? "✓" : "✗") . "\n";
                }
                if (defined('BASE_PATH')) {
                    $debugInfo .= "  BASE_PATH: " . BASE_PATH . "\n";
                }
                
                error_log($debugInfo);
                abort(404);
            }
        }

        // Ако рута не е пронајдена
        abort(404);
    }

    /**
     * Проверка дали рута одговара
     */
    protected function matchRoute($routeUri, $requestUri)
    {
        $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([^/]+)', $routeUri);
        return preg_match("#^{$pattern}$#", $requestUri);
    }

    /**
     * Извлекување параметри од URL
     */
    protected function extractParams($routeUri, $requestUri)
    {
        preg_match_all('/\{([a-zA-Z0-9_]+)\}/', $routeUri, $paramNames);
        $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([^/]+)', $routeUri);
        preg_match("#^{$pattern}$#", $requestUri, $matches);
        array_shift($matches);

        // Set params as global variable for controllers
        global $params;
        $params = [];
        
        foreach ($paramNames[1] as $index => $name) {
            $value = $matches[$index] ?? null;
            $_GET[$name] = $value;
            $params[$name] = $value;
        }
    }
}



