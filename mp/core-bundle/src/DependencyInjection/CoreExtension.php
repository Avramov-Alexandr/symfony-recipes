<?php

namespace MP\CoreBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;


class CoreExtension extends Extension implements ExtensionInterface
{
    public function load(array $configs, ContainerBuilder $container): void
    {
//        $configuration = new Configuration();
//        $config = $this->processConfiguration($configuration, $configs);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../../config'));
        $loader->load('services.yaml');
//        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../../config/routes'));
//        $loader->load('core_bundle.yaml');

        $container->register('mp_core_bundle.route_loader', 'MP\CoreBundle\Routing\RouteLoader')
            ->addTag('routing.loader');
    }

    public function getAlias(): string
    {
        return 'core_bundle';
    }
}
