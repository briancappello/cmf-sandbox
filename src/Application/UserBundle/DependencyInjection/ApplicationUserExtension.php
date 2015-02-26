<?php

namespace Application\SiteBundle\DependencyInjection;

use Symfony\Cmf\Bundle\CoreBundle\DependencyInjection\Configuration;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader;

class ApplicationUserExtension extends Extension
{
    const ALIAS = 'application_user';

    public function load(array $configs, ContainerBuilder $container)
    {
        $config = $this->processConfiguration(new Configuration(), $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        $container->setParameter('sonata.user.admin.groupname', self::ALIAS);
    }
}
