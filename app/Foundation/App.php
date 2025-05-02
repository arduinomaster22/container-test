<?php

namespace App\Foundation;

class App
{
    public static Container $instance;

    public static function setInstance(Container $container): void
    {
        self::$instance = $container;
        
    }

    public static function getInstance(): Container
    {
        return self::$instance;
    }

    public static function __callStatic($name, $arguments)
    {
        return static::getInstance()->$name(...$arguments);
    }
}
