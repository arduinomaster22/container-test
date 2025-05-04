<?php

namespace App\Plates\Routing;

class RoutingContainer
{
    public static $routes = [];

    public static function addRoute(Route $route)
    {
        static::$routes[$route->getName()] = $route;
    }

    public static function getRoutes()
    {
        return static::$routes;
    }
}
