<?php

namespace Erp\Bundle\OauthBundle\Manager;

use Symfony\Component\Security\Core\User\UserProviderInterface;

use FOS\OAuthServerBundle\Model\AccessTokenManagerInterface;

use Erp\Bundle\CoreBundle\Domain\CQRS\SimpleCommand;
use Erp\Bundle\OauthBundle\Domain\CQRS\OauthTokenOrCodeQuery as QueryInterface;

class OauthAccessTokenManager extends OauthTokenManager implements AccessTokenManagerInterface {
    /**
     * {@inheritdoc}
     */
    // public function __construct(QueryInterface $query, SimpleCommand $command, UserProviderInterface $userProvider)
    // {
    //     parent::__construct($query, $command, $userProvider);
    // }
}
