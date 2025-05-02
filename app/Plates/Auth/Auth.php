<?php

namespace App\Plates\Auth;

class Auth implements AuthInterface
{
    public string $name;

    public string $email;

    public function __construct(string $name, string $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public static function configure()
    {
        return new static(
            'John Doe',
            'john@doe.nl'
        );
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
