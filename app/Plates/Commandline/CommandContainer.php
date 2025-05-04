<?php
namespace App\Plates\Commandline;

class CommandContainer
{
    public static $commands = [];

    public static function addCommand(Command $command)
    {
        static::$commands[$command->getName()] = $command;
    }

    public static function getCommands()
    {
        return static::$commands;
    }
}
