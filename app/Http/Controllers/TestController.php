<?php

namespace App\Http\Controllers;

class TestController
{
    public function index()
    {
        return json_encode([
            'message' => 'Hello, World!',
        ]);
    }
}
