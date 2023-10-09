<?php

namespace App\Handler;

use App\Entity\Greeting;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

#[AsMessageHandler]
class GreetingHandler
{
    public function __invoke(Greeting $message)
    {
        dd($message);
    }
}
