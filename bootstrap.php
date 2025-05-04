<?php

use App\Foundation\App;
use App\Foundation\Container;
use Spatie\Ignition\Ignition;

include __DIR__ . '/vendor/autoload.php';

Ignition::make()->register();

$container = Container::make(__DIR__);

$container->registerHelpers();

App::setInstance($container);

