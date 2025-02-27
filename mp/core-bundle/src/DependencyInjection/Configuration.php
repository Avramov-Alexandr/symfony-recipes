<?php
namespace MP\CoreBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('core_bundle');

        $treeBuilder->getRootNode()
            ->children()
            ->scalarNode('example_param')
            ->defaultValue('default_value')
            ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
