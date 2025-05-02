<?php

namespace App\Plates\Auth;

class AuthProvider
{
    public static function make($arguments = [])
    {
        return static::getAuth($arguments);
    }

    public static function getAuth($arguments): AuthInterface
    {
        return Auth::configure(...$arguments);
    }
}
