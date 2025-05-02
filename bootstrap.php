<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\App;
use App\Container;

$container = Container::make();

App::setInstance($container);

function app()
{
    return App::getInstance();
}