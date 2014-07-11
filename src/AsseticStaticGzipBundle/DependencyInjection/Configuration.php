<?php

namespace KonstantinKuklin\AsseticStaticGzipBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author KonstantinKuklin <konstantin.kuklin@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();

        $rootNode = $treeBuilder->root('assetic_static_gzip');
        $rootNode
            ->children()
                ->booleanNode('use')
                    ->isRequired()
                ->end()
                ->integerNode('level')
                    ->defaultValue(9)
                    ->min(0)
                    ->max(9)
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}