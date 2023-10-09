<?php

namespace App\Entity;

use ApiPlatform\Action\NotFoundAction;
use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Post;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This is a dummy entity. Remove it!
 */
#[ApiResource(operations: [
    new Get(controller: NotFoundAction::class, read: false, status: 404),
    new Post(messenger: true, output: false, status: 202)
])]
class Greeting
{
    /**
     * A nice person
     */
    #[ORM\Column]
    #[Assert\NotBlank]
    #[ApiProperty(identifier: true)]
    public string $name = '';
}
