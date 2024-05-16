<?php

namespace App;

class Router
{
    protected $routes = [];

    public function get($path, $callback)
    {
        $this->routes['GET'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['POST'][$path] = $callback;
    }

    public function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        foreach ($this->routes[$method] as $routePattern => $callback) {
            $routePattern = str_replace('/', '\/', $routePattern);
            $routePattern = preg_replace('/\{[a-z]+\}/', '([a-z0-9]+)', $routePattern);

            if (preg_match('/^' . $routePattern . '$/', $uri, $matches)) {
                array_shift($matches); // remove the first element which is the full string match
                call_user_func_array($callback, $matches);
                return;
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }
}