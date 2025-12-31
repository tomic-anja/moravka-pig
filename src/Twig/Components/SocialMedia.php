<?php

namespace App\Twig\Components;

use App\Entity\SocialMedia as EntitySocialMedia;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class SocialMedia
{
    public array $socialMedia = [];

    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function mount(): void
    {
        $this->socialMedia = $this->entityManager->getRepository(EntitySocialMedia::class)->findAll();

    }
}
