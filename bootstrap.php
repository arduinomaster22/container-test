<?php

use App\Foundation\App;
use App\Foundation\Container;

require_once __DIR__.'/vendor/autoload.php';

$container = Container::make(__DIR__);

$container->registerHelpers();

App::setInstance($container);
