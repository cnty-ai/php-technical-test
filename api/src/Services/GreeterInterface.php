<?php

namespace App\Services;

use App\Entity\Greeting;

interface GreeterInterface
{
    public function greet(Greeting $greeting): string;
}
