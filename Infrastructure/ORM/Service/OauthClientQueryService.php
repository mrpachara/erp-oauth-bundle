<?php

namespace Erp\Bundle\OauthBundle\Infrastructure\ORM\Service;

class OauthClientQueryService extends OauthClientQuery
{
    /** @required */
    public function setRepository(\Symfony\Bridge\Doctrine\RegistryInterface $doctrine)
    {
        $this->repository = $doctrine->getRepository('ErpOauthBundle:OauthClient', 'oauth');
    }
}
