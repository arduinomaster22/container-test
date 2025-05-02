<?php

namespace App\Plates\Request;

class RequestProvider
{
    public static function make()
    {
        return static::makeRequest();
    }

    public static function makeRequest()
    {
        return RequestResolver::configure();
    }
}
