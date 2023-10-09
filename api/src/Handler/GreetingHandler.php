<?php

namespace App\Handler;

use App\Entity\Greeting;
use App\Services\GreeterInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\Attribute\TaggedIterator;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

#[AsMessageHandler]
class GreetingHandler
{
    public function __construct(
        #[TaggedIterator('app.greeter')]
        private iterable $handlers,
        private LoggerInterface $logger
    )
    {
    }

    public function __invoke(Greeting $message)
    {
        /** @var GreeterInterface $greetingHandler */
        foreach ($this->handlers as $greetingHandler) {
            $this->logger->info($greetingHandler->greet($message));
        }
        return $message;
    }

}
