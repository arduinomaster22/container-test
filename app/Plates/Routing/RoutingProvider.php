<?php

namespace App\Plates\Routing;

class RoutingProvider
{
    public static $routes = [];

    public static function make()
    {
        static::configure();
    }

    public static function configure()
    {
        static::resolveRoutes();

        $requestRelativePath = $_SERVER['REQUEST_URI'];

        $route = static::findRoute($requestRelativePath);

        return static::executeRoute($route);
    }

    public static function findRoute($requestRelativePath)
    {
        foreach (static::$routes as $route) {
            if ($route['uri'] === $requestRelativePath) {
                return $route;
            }
        }

        return null;
    }

    public static function executeRoute($route)
    {
        if (!is_null($route['callback'])) {
            $callback = $route['callback'];

            echo $callback();
        }

        echo null;
    }

    public static function resolveRoutes()
    {
        include app()->basePath() . '/routes/web.php';
    }
}
