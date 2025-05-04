<?php

namespace App\Plates\Routing;

use Closure;

class Route
{
    public $name;
    public $method;
    public $uri;
    public Closure|array $callback;

    public function __construct($method, $uri, $callback)
    {
        $this->method = $method;
        $this->uri = $uri;
        $this->callback = $callback;
    }

    public static function get($uri, $callback): static
    {
        return new static('GET', $uri, $callback);
    }

    public function name($name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name ?? rand(1, 1000);
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getCallback(): callable|array
    {
        return $this->callback;
    }

    public function __destruct()
    {
        RoutingContainer::addRoute($this);
    }
}
