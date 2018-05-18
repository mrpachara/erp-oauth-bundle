<?php

namespace Erp\Bundle\OauthBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

use Erp\Bundle\OauthBundle\DependencyInjection\Compiler\ScopeProcessorRegistryPass;

class ErpOauthBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new ScopeProcessorRegistryPass());
    }
}
