<?php

namespace App\Plates\Database;

class DatabaseProvider
{
    public static function make()
    {
        return static::getDatabase();
    }

    public static function getDatabase()
    {
        return Database::configure();
    }
}
