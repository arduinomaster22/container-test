<?php

use App\Foundation\App;
use App\Plates\Routing\Route;

Route::get('/', function () {
    return view()
        ->layout('base', ['title' => 'Home'])
        ->renderComponent('site', ['request' => app()->request()]);
})
    ->name('hi');

Route::get('/about', function () {
    return view()
        ->layout('base', ['title' => 'About'])
        ->renderComponent('site', ['request' => app()->request()]);
})
    ->name('about');
