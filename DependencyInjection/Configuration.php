<?php

namespace KonstantinKuklin\AsseticStaticGzipBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 *
 * @author KonstantinKuklin <konstantin.kuklin@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
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