<?php

namespace Erp\Bundle\OauthBundle\Infrastructure\ORM\Service;

class OauthAccessTokenQueryService extends OauthAccessTokenQuery
{
    /** @required */
    public function setRepository(\Symfony\Bridge\Doctrine\RegistryInterface $doctrine)
    {
        $this->repository = $doctrine->getRepository('ErpOauthBundle:OauthAccessToken', 'oauth');
    }
}
