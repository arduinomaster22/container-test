<?php

namespace App\Plates\Request;

use App\Foundation\App;

class RequestResolver
{
    public static $baseRequest;

    public static function configure()
    {
        static::$baseRequest = static::createRequest();

        return static::render();
    }

    public static function getRequest()
    {
        return static::$baseRequest;
    }

    public static function createRequest()
    {
        return [
            'cookies' => $_COOKIE,
            'files' => $_FILES,
            'get' => $_GET,
            'post' => $_POST,
            'server' => $_SERVER,
            'request' => $_REQUEST,
        ];
    }

    public static function render()
    {
        return App::getInstance()->routing(static::getRequest());
    }
}
