<?php

namespace App\Plates\Commandline;

abstract class Command
{
    protected string $name;
    protected string $description;

    public function getName(): string
    {
        return explode(' ', $this->name)[0];
    }

    public function getParameters(): array
    {
        /**
         * example = "migrate {data} {interest}"
         */
        $name = $this->getName();

        $parameters = explode(' ', $this->name);
        $parameters = array_slice($parameters, 1);
        $parameters = array_map(function ($parameter) {
            return trim($parameter, '{}');
        }, $parameters);
        $parameters = array_filter($parameters, function ($parameter) {
            return !empty($parameter);
        });

        dd($parameters);
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function execute(...$args): void
    {
        $this->handle(...$args);
    }
}
