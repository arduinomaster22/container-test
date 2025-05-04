<?php

namespace App\Foundation\Commands;

class TestCommand extends \App\Plates\Commandline\Command
{
    protected string $name = 'migrate {direction}';
    protected string $description = 'Test command';

    public function handle($direction = 'up'): void
    {
        $migrations = $this->getMigrations();
    }

    public function getMigrations(): array
    {
        $basePath = \App\Foundation\Container::get('basePath');
        $migrationsPath = $basePath . '/app/Database/Migrations';
        $migrationFiles = glob($migrationsPath . '/*.php');

        return $migrationFiles;
    }
}
