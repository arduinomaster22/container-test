<?php

use App\Foundation\App;
use App\Foundation\Container;

require_once __DIR__ . '/../bootstrap.php';

return App::getInstance()->requestResolver();

