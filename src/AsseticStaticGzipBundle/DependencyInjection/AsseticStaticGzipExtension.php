<?php

namespace KonstantinKuklin\AsseticStaticGzipBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

class AsseticStaticGzipExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('assetic_static_gzip.use', $config['use']);
        $container->setParameter('assetic_static_gzip.level', $config['level']);
    }

    /**
     * {@inheritdoc}
     */
    public function getAlias()
    {
        return 'assetic_static_gzip';
    }
}
