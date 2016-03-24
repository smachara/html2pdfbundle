<?php

namespace smachara\html2pdfbundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('smachara_html2pdf');

        $rootNode
            ->children()
            ->scalarNode('orientation')->defaultValue('P')->end()
            ->scalarNode('format')->defaultValue('A4')->end()
            ->scalarNode('lang')->defaultValue('en')->end()
            ->booleanNode('unicode')->defaultTrue()->end()
            ->scalarNode('encoding')->defaultValue('UTF-8')->end()
            ->arrayNode('margin')
            ->prototype('scalar')->end()
            ->defaultValue(array(10, 15, 10, 15))
            ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}