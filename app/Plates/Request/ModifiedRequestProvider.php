<?php

namespace App\Plates\Request;

use App\Plates\Request\Request;

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
