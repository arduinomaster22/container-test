<?php

namespace App\Plates\Commandline;

class CommandProvider
{
    public function boot()
    {
        $this->getCommands();
    }

    public function getCommands()
    {
        $this->loadCommands();
    }

    public function loadCommands(): void
    {
        $basePath = \App\Foundation\Container::get('basePath');

        $commandsPath = $basePath . '/app/Foundation/Commands';

        $commandFiles = glob($commandsPath . '/*.php');

        foreach ($commandFiles as $file) {
            $className = 'App\Foundation\Commands\\' .  basename($file, '.php');

            if (class_exists($className)) {
                $command = new $className();
                if ($command instanceof Command) {
                    CommandContainer::addCommand($command);
                }
            }
        }
    }
}
