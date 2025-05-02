<?php

namespace App\Plates\Routing;

class Route
{
    public static function get($uri, $callback): static
    {
        $entry =  [
            'method' => 'GET',
            'uri' => $uri,
            'callback' => $callback,
            'name' => null,
        ];

        RoutingProvider::$routes[] = $entry;

        return new static($entry);
    }

    public function name($name): self
    {
        RoutingProvider::$routes[count(RoutingProvider::$routes) - 1]['name'] = $name;

        return $this;
    }
}
