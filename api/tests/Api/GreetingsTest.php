<?php

namespace App\Tests\Api;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;
use App\Services\DevGreeter;
use App\Services\FriendGreeter;

class GreetingsTest extends ApiTestCase
{
    public function testCreateGreeting(): void
    {
        $client = static::createClient();
        $container = static::getContainer();

        $temp = $this->createMock(FriendGreeter::class);
        $temp->expects($this->once())->method('greet')->willReturn('Friend');
        $container->set(FriendGreeter::class, $temp);

        $temp2 = $this->createMock(DevGreeter::class);
        $temp2->expects($this->once())->method('greet')->willReturn('Friend');
        $container->set(DevGreeter::class, $temp2);

        $client->request('POST', '/greetings', [
            'json' => [
                'name' => 'Gaetan',
            ],
            'headers' => [
                'Content-Type' => 'application/ld+json',
            ],
        ]);

        $this->assertResponseStatusCodeSame(202);
    }
}
