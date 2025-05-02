<?php

use App\Container;

require_once __DIR__ . '/bootstrap.php';

Container::set('app', 'hi');

dd(app()->get('app'), app()->getAuthUser());
