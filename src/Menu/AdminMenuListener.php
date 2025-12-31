<?php

namespace App\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

final class AdminMenuListener
{
    private AuthorizationCheckerInterface $authorizationChecker;

    public function __construct(AuthorizationCheckerInterface $authorizationChecker)
    {
        $this->authorizationChecker = $authorizationChecker;
    }

    public function addAdminMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $menu
            ->addChild('social_media', [
                'route' => 'app_admin_social_media_index',
            ])
            ->setLabel('Social media')
            ->setLabelAttribute('icon', 'tabler:brand-facebook');
    }
}