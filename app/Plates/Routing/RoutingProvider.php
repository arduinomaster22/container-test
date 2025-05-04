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
        $routes = static::resolveRoutes();

        $requestRelativePath = $_SERVER['REQUEST_URI'];

        $requestRelativePath = parse_url($requestRelativePath, PHP_URL_PATH);

        $route = static::findRoute($requestRelativePath, $routes);

        if (is_null($route)) {
            throw new \Exception("Route not found for path: {$requestRelativePath}");
        }

        static::renderRoute($route);
    }

    public static function findRoute($requestRelativePath, $routes)
    {
        /**
         * @var Route $route
         */
        foreach ($routes as $route) {
            if ($route->getUri() === $requestRelativePath) {
                return $route;
            }
        }

        return null;
    }

    public static function renderRoute(Route $route)
    {
        echo static::executeRoute($route);
    }

    public static function executeRoute(Route $route)
    {
        if (! is_null($route->getCallback())) {
            $callback = $route->getCallback();

            return $callback();
        }

        return null;
    }

    public static function resolveRoutes()
    {
        include_once app()->basePath() . '/routes/web.php';

        $routes = RoutingContainer::getRoutes();

        return $routes;
    }
}
