<?php

namespace App\Services;

use App\Entity\Greeting;

class FriendGreeter implements GreeterInterface
{

    public function greet(Greeting $greeting): string
    {
        return 'Greetings Friend';
    }
}
