<?php

namespace App\Http\Controllers;

class TestController
{
    public function index()
    {
        return view()
            ->layout('base', ['title' => 'About'])
            ->renderComponent('site', ['request' => app()->request()]);
    }
}
