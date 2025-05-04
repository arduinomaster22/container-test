<?php

use App\Foundation\App;
use App\Http\Controllers\TestController;
use App\Plates\Routing\Route;
use App\Plates\Routing\RoutingContainer;

Route::get('/', [TestController::class, 'index'])   
    ->name('hi');

Route::get('/about', function () {
    return view()
        ->layout('base', ['title' => 'About'])
        ->renderComponent('site', ['request' => app()->request()]);
})
    // ->name('about')

;
