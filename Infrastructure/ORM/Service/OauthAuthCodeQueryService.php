<?php

namespace Erp\Bundle\OauthBundle\Infrastructure\ORM\Service;

class OauthAuthCodeQueryService extends OauthAuthCodeQuery
{
    /** @required */
    public function setRepository(\Symfony\Bridge\Doctrine\RegistryInterface $doctrine)
    {
        $this->repository = $doctrine->getRepository('ErpOauthBundle:OauthAuthCode', 'oauth');
    }
}
