<?php

namespace App\Services;

use App\Entity\Greeting;

class DevGreeter implements GreeterInterface
{

    public function greet(Greeting $greeting): string
    {
        return 'Greetings Dev';
    }
}
