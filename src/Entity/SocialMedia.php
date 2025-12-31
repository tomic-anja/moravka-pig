<?php

namespace App\Entity;

use App\Form\Type\SocialMediaType;
use Doctrine\ORM\Mapping as ORM;
use App\Grid\SocialMediaGrid;
use Sylius\Resource\Model\ResourceInterface;
use Sylius\Resource\Metadata\AsResource;
use Sylius\Resource\Metadata\Index;
use Sylius\Resource\Metadata\Create;
use Sylius\Resource\Metadata\Delete;
use Sylius\Resource\Metadata\Update;
use Sylius\Resource\Metadata\BulkDelete;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[UniqueEntity(fields: ['code'], message: 'This code is already in use.')]
#[ORM\Table(name: 'sylius_social_media')]
#[ORM\Entity]
#[AsResource(
    section: 'admin',
    routePrefix: '/admin',
    templatesDir: '@SyliusAdminUi/crud',
    operations: [
        new Index(grid: SocialMediaGrid::class),
        new Create(formType: SocialMediaType::class),
        new Delete(),
        new Update(formType: SocialMediaType::class),
        new BulkDelete()
    ],
)]
class SocialMedia implements ResourceInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Naslov je obavezan.')]
    private ?string $title = null;

    #[ORM\Column(length: 255, unique: true)]
    #[Assert\NotBlank(message: 'Kod je obavezan.')]
    private ?string $code = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Link je obavezan.')]
    private ?string $link = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): static
    {
        $this->link = $link;

        return $this;
    }
}
