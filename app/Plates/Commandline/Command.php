<?php

namespace App\Plates\Commandline;

abstract class Command
{
    protected string $name;
    protected string $description;

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function execute(...$args): void
    {
        $this->handle($args);
    }
}
