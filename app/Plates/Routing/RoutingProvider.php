<?php

namespace App\Plates\Routing;

class RoutingProvider
{
    public static $routes = [];

    public static function make()
    {
        return static::configure();
    }

    public static function configure()
    {
        static::resolveRoutes();

        $requestRelativePath = $_SERVER['REQUEST_URI'];

        $requestRelativePath = parse_url($requestRelativePath, PHP_URL_PATH);

        $route = static::findRoute($requestRelativePath);

        if (is_null($route)) {
            throw new \Exception("Route not found for path: {$requestRelativePath}");
        }

        static::renderRoute($route);
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

    public static function renderRoute($route)
    {
        echo static::executeRoute($route);
    }

    public static function executeRoute($route)
    {
        if (! is_null($route['callback'])) {
            $callback = $route['callback'];

            return $callback();
        }

        return null;
    }

    public static function resolveRoutes()
    {
        include app()->basePath().'/routes/web.php';
    }
}
