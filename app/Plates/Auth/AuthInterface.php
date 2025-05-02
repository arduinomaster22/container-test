<?php

namespace App\Plates\Auth;

interface AuthInterface
{
    public function getName(): string;

    public function getEmail(): string;
}