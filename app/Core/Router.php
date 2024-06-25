<?php

declare(strict_types=1);

namespace App\Core;


class Router
{

    protected $routes = [];

    public function get($uri, $controller, $func)
    {
        $this->routes[] = [
            'uri' => '/notes_app_php' . $uri,
            'controller' => $controller . '.php',
            'method' => 'GET',
            'function' => $func
        ];
        return $this;
    }
    public function post($uri, $controller, $func)
    {
        $this->routes[] = [
            'uri' => '/notes_app_php' . $uri,
            'controller' => $controller . '.php',
            'method' => 'POST',
            'function' => $func
        ];
        return $this;
    }

    public function delete($uri, $controller, $func)
    {
        $this->routes[] = [
            'uri' => '/notes_app_php' . $uri,
            'controller' => $controller . '.php',
            'method' => 'DELETE',
            'function' => $func
        ];
        return $this;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {

            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                $controllerPath = BASE_PATH .  'app/Controllers/' . $route['controller'];

                if (file_exists($controllerPath)) {
                    require BASE_PATH . 'app/Controllers/IndexController.php';
                    $controllerClass = explode('.', $route['controller'])[0];
                    $controllerString = '\\App\\Controllers\\' . $controllerClass;
                    $controllerClass = new $controllerString();
                    call_user_func([$controllerClass, $route['function']]);
                } else {
                    echo "Controller não encontrado!";
                }
                return;
            }
        }
    }


    public static function showPartials($dir)
    {
        return include(BASE_PATH . "views/partials/{$dir}.php");
    }
}
