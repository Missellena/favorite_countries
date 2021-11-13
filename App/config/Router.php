<?php

/*
* Class for defining routes
*/

class Router
{
    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $router = new static;
        include $file;

        return $router;
    }

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $request)
    {
        if(array_key_exists($uri, $this->routes[$request])) {
            
            return $this->routes[$request][$uri];
        }

        header('Location: /404');
        throw new Exception('This route is not defined');
    }

}