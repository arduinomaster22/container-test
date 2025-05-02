<?php

namespace App;

interface AuthInterface
{
    public function getName(): string;

    public function getEmail(): string;
}