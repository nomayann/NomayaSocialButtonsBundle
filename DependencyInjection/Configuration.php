<?php

namespace Nomaya\Bundle\SocialBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('nomaya_social');
        
        $rootNode
            ->children()
                ->arrayNode('buttons')
                    ->useAttributeAsKey('networks')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('url')
                                ->defaultNull()
                            ->end()
                            ->scalarNode('locale')
                                ->defaultValue('%locale%')
                            ->end()
                            // Facebook specific
                            ->integerNode('width')->end()
                            ->booleanNode('showFaces')
                                ->defaultFalse()
                            ->end()
                            ->booleanNode('send')
                                ->defaultTrue()
                            ->end()
                            // Twitter specific
                            ->scalarNode('layout')->end()
                            ->scalarNode('message')->end()
                            ->scalarNode('text')->end()
                            ->scalarNode('via')->end()
                            ->scalarNode('tag')->end()
                            // G+ specific
                            ->scalarNode('annotation')->end()
                            ->scalarNode('size')->end()
                            // Linkedin specific
                            ->scalarNode('counter')->end()

                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
