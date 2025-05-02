<?php

namespace App\Plates\Request;

class Request
{
    public static function configure()
    {
        $request = RequestResolver::getRequest();

        return new static;
    }

    public function input($key, $default = null)
    {
        $request = RequestResolver::getRequest();

        $getParameters = $request['get'];

        return isset($getParameters[$key]) ? $getParameters[$key] : $default;
    }
}
