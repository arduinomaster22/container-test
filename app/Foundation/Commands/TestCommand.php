<?php

namespace App\Foundation\Commands;

class TestCommand extends \App\Plates\Commandline\Command
{
    protected string $name = 'Migrate';
    protected string $description = 'Test command';

    public function handle(): void
    {
        echo "Test command executed successfully.\n";
    }
}
