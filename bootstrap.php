<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Container;

Container::set('auth', App\Auth::configure());