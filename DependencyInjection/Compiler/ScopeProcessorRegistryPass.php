<?php
namespace Erp\Bundle\OauthBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

use Erp\Bundle\OauthBundle\Processor\ScopeProcessorRegistry;

class ScopeProcessorRegistryPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        // always first check if the primary service is defined
        if (!$container->has(ScopeProcessorRegistry::class)) {
            return;
        }

        $definition = $container->findDefinition(ScopeProcessorRegistry::class);

        // find all service IDs with the erp_oauth.scope_processor
        $taggedServices = $container->findTaggedServiceIds('erp_oauth.scope_processor');
        foreach ($taggedServices as $id => $tags) {
            // add the ScopeProcessor service to the ScopeProcessorContainer service
            foreach($tags as $attributes) {
                if(empty($attributes['method']))
                    throw new \InvalidArgumentException("methd property is requered for erp_oauth.scope_processor");
                $definition->addMethodCall('addProcessor', [new Reference($id), $attributes['method']]);
            }
        }
    }
}
