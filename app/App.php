<?php

namespace App;

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
}
