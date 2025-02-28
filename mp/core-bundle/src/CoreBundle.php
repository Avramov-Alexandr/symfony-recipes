<?php

namespace MP\CoreBundle;

use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

class CoreBundle extends AbstractBundle
{
//    public function configure(DefinitionConfigurator $definition): void
//    {
//        $definition->rootNode()
//            ->children()
//            ->scalarNode('example_param')
//            ->defaultValue('default_value')
//            ->end()
//            ->end()
//        ;
//    }

    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $container->import('../config/services.yaml');
        $container->import('../config/routes.yaml');
        //$container->import('../config/routes.yaml', 'yaml');
        //$container->import(__DIR__.'/Controller/', 'attribute');
    }

    public function getContainerExtension(): ?ExtensionInterface
    {
        return new DependencyInjection\CoreExtension();
    }

}
