<?php

use App\Foundation\App;
use Illuminate\Support\Str;
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

function view(): \App\Plates\View\View
{
    return app()->view();
}
