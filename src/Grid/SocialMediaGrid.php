<?php

namespace App\Grid;

use App\Entity\SocialMedia;
use Sylius\Bundle\GridBundle\Builder\Action\CreateAction;
use Sylius\Bundle\GridBundle\Builder\Action\DeleteAction;
use Sylius\Bundle\GridBundle\Builder\Action\UpdateAction;
use Sylius\Bundle\GridBundle\Builder\ActionGroup\BulkActionGroup;
use Sylius\Bundle\GridBundle\Builder\ActionGroup\ItemActionGroup;
use Sylius\Bundle\GridBundle\Builder\ActionGroup\MainActionGroup;
use Sylius\Bundle\GridBundle\Builder\Field\StringField;
use Sylius\Bundle\GridBundle\Builder\GridBuilderInterface;
use Sylius\Bundle\GridBundle\Grid\AbstractGrid;
use Sylius\Bundle\GridBundle\Grid\ResourceAwareGridInterface;

final class SocialMediaGrid extends AbstractGrid implements ResourceAwareGridInterface
{
    public function __construct()
    {
        // TODO inject services if required
    }

    public static function getName(): string
    {
        return 'app_admin_social_media';
    }

    public function buildGrid(GridBuilderInterface $gridBuilder): void
    {
        $gridBuilder
        ->addField(
            StringField::create('code')
                ->setLabel('Code')
                ->setSortable(true)
        )
        ->addField(
            StringField::create('title')
                ->setLabel('Title')
                ->setSortable(true)
        )
        ->addField(
            StringField::create('link')
                ->setLabel('Category')
                ->setSortable(true)
        )
        ->addActionGroup(
            MainActionGroup::create(
                CreateAction::create()
            )
        )
        ->addActionGroup(
            ItemActionGroup::create(
                UpdateAction::create(),
                DeleteAction::create()
            )
        )
        ->addActionGroup(
            BulkActionGroup::create(
                DeleteAction::create()
            )
        );
    }

    public function getResourceClass(): string
    {
        return SocialMedia::class;
    }
}