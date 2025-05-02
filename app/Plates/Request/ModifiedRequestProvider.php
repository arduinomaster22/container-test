<?php

namespace App\Plates\Request;

class ModifiedRequestProvider
{
    public static function make()
    {
        return static::resolveRequest();
    }

    public static function resolveRequest()
    {
        return Request::configure();
    }
}
