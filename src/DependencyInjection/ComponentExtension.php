<?php

namespace MateCommerce\Component\Base\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class ComponentExtension extends Extension
{
    private string $componentPath;

    public function __construct(string $componentPath)
    {
        $this->componentPath = $componentPath;
    }

    public function load(array $configs, ContainerBuilder $container)
    {

        foreach ($this->getConfigurationFiles() as $dir => $configurationFiles) {
            $loader = new YamlFileLoader(
                $container,
                new FileLocator($dir)
            );

            foreach ($configurationFiles as $configurationFile) {
                if (file_exists($dir . '/' . $configurationFile)) {
                    $loader->load($configurationFile);
                }
            }
        }
    }

    protected function getConfigurationFiles(): array
    {
        return [
            $this->componentPath . '/Resources/config' => [
                'service.yml',
            ]
        ];
    }
}