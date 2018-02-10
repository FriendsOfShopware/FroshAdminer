<?php

namespace AdminerForShopware;

use Shopware\Components\Plugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class AdminerForShopware
 */
class AdminerForShopware extends Plugin
{
    public function build(ContainerBuilder $container)
    {
        $container->setParameter('adminer.views_dir', __DIR__ . '/Resources/views');
        parent::build($container);
    }
}
