<?php

use App\Foundation\App;
use App\Foundation\Container;
use App\Plates\Request\Request;

function app(): Container
{
    return App::getInstance();
}

function request(): Request
{
    return app()->request();
}

function view($view, $data = [])
{
    return app()->view()->renderComponent($view, $data);
}
