<?php

namespace App;

class Container
{
    protected static array $values;

    public static function make(): void
    {
        self::set('auth', Auth::configure());
    }

    public static function set($key, mixed $value): void
    {
        self::$values[$key] = $value;
    }

    public static function get($key): mixed
    {
        return self::$values[$key] ?? null;
    }

    public static function getAuthUser(): AuthInterface
    {
        return self::get('auth');
    }
}
