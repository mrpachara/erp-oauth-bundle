<?php

namespace Erp\Bundle\OauthBundle\Manager;

use Symfony\Component\Security\Core\User\UserProviderInterface;

use FOS\OAuthServerBundle\Model\RefreshTokenManagerInterface;

use Erp\Bundle\CoreBundle\Domain\CQRS\SimpleCommand;
use Erp\Bundle\OauthBundle\Domain\CQRS\OauthTokenOrCodeQuery as QueryInterface;

class OauthRefreshTokenManager extends OauthTokenManager implements RefreshTokenManagerInterface {
    /**
     * {@inheritdoc}
     */
    // public function __construct(QueryInterface $query, SimpleCommand $command, UserProviderInterface $userProvider)
    // {
    //     parent::__construct($query, $command, $userProvider);
    // }
}
