<?php

namespace App\Plates\View;

class ViewProvider
{
    public static function make($arguments = [])
    {
        return static::getView($arguments);
    }

    public static function getView($arguments)
    {
        return View::configure(...$arguments);
    }
}
