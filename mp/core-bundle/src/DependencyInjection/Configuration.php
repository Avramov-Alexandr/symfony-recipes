<?php
namespace MP\CoreBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('MP\CoreBundle\Controller');

        $rootNode = $treeBuilder->getRootNode()
            ->children()
            ->scalarNode('example_param')
            ->defaultValue('default_value')
            ->end()
            ->end()
        ;

        return $treeBuilder;
    }

}
