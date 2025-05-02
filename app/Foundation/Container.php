<?php

namespace App\Foundation;

class Container
{
    protected static array $values;

    protected static array $providers;

    public function __construct()
    {
        static::$providers = [
            'auth' => \App\Plates\Auth\AuthProvider::class,
            'view' => \App\Plates\View\ViewProvider::class,
            'requestResolver' => \App\Plates\Request\RequestProvider::class,
            'request' => \App\Plates\Request\ModifiedRequestProvider::class,
            'routing' => \App\Plates\Routing\RoutingProvider::class,
        ];
    }

    public static function make($basePath)
    {
        static::set('basePath', $basePath);

        return new static($basePath);
    }

    public static function set($key, mixed $value): void
    {
        self::$values[$key] = $value;
    }

    public static function get($key): mixed
    {
        return self::$values[$key] ?? null;
    }

    public static function registerHelpers(): void
    {
        include static::get('basePath').'/app/Foundation/Support/helpers.php';
    }

    public function __call($name, $arguments)
    {
        if (isset(self::$providers[$name])) {
            $provider = self::$providers[$name];

            return $provider::make(...$arguments);
        }

        if (isset(self::$values[$name])) {
            return self::$values[$name];
        }

        return null;
    }
}
