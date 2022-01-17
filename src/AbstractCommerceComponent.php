<?php

namespace MateCommerce\Component\Base;

use MateCommerce\Component\Base\DependencyInjection\ComponentExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AbstractCommerceComponent extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        /*
        $container
            ->addCompilerPass(new OrmRegistrationPass(
                $this->getPath(),
                $this->getNamespace()
            ));
        */
    }

    public function getContainerExtension(): ?ExtensionInterface
    {
        return new ComponentExtension($this->getPath());
    }
}