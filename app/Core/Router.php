<?php

declare(strict_types=1);

namespace App\Core;

class Router
{

    protected $routes = [];

    public function get($uri, $controller)
    {
        $this->routes[] = [
            'uri' => '/notes_app_php' . $uri,
            'controller' => $controller . '.php',
            'method' => 'GET',
        ];
        return $this;
    }
    public function post($uri, $controller)
    {
        $this->routes[] = [
            'uri' => '/notes_app_php' . $uri,
            'controller' => $controller . '.php',
            'method' => 'POST',
        ];
        return $this;
    }

    public function delete($uri, $controller)
    {
        $this->routes[] = [
            'uri' => '/notes_app_php' . $uri,
            'controller' => $controller . '.php',
            'method' => 'DELETE',
        ];
        return $this;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {

            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                require base_path('app/Controllers/' . $route['controller']);
            }
        }
    }


    public static function showPartials($dir)
    {
        return include(BASE_PATH . "views/partials/{$dir}.php");
    }
}
