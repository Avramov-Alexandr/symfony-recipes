<?php

namespace MPCoreBundle;

use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

class MPCoreBundle extends AbstractBundle
{

    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $container->import('../config/services.yaml');
        $container->import('../config/routes.yaml');
        $container->services()
            ->get('MPCoreBundle');
        //$container->import('../config/routes.yaml', 'yaml');
        //$container->import(__DIR__.'/Controller/', 'attribute');
    }

    public function getContainerExtension(): ?ExtensionInterface
    {
        return new DependencyInjection\CoreExtension();
    }

    public function configure(DefinitionConfigurator $definition): void
    {
        $definition->rootNode()
            ->children()
            ->arrayNode('twitter')
            ->children()
            ->integerNode('client_id')->end()
            ->scalarNode('client_secret')->end()
            ->end()
            ->end() // twitter
            ->end()
        ;
        $definition->import('../config/services.yaml');
        $definition->import('../config/routes.yaml');
    }


}
