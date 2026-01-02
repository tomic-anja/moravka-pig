<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Product\Product;
use Sylius\Component\Locale\Context\LocaleContextInterface;
use Sylius\Component\Channel\Context\ChannelContextInterface;

#[AsTwigComponent]
final class PopularProducts
{
    public array $products = [];

    public function __construct(
        private EntityManagerInterface $entityManager, 
        private LocaleContextInterface $localeContext, 
        private ChannelContextInterface $channelContext
    )
    {}

    public function mount(): void
    {
        $locale = $this->localeContext->getLocaleCode();
        $channel = $this->channelContext->getChannel();

        $queryBuilder = $this->entityManager->createQueryBuilder();

        $queryBuilder->select('o', 'translation')
            ->from(Product::class, 'o')
            ->innerJoin('o.translations', 'translation', 'WITH', 'translation.locale = :locale')
            ->andWhere('o.enabled = :enabled')
            ->andWhere(':channel MEMBER OF o.channels')
            ->andWhere('o.isPopular = :isPopular')
            ->setParameter('locale', $locale)
            ->setParameter('channel', $channel)
            ->setParameter('enabled', true)
            ->setParameter('isPopular', true);

        $this->products = $queryBuilder->getQuery()->getResult();
    }
}
