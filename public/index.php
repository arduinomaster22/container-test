<?php

use App\Foundation\App;
use App\Foundation\Container;

require_once __DIR__ . '/../bootstrap.php';

App::getInstance()->requestResolver();
   