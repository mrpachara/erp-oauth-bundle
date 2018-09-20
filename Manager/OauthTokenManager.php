<?php

namespace Erp\Bundle\OauthBundle\Manager;

use Symfony\Component\Security\Core\User\UserProviderInterface;

use FOS\OAuthServerBundle\Model\TokenManagerInterface;
use FOS\OAuthServerBundle\Model\TokenInterface;

use Erp\Bundle\CoreBundle\Domain\CQRS\SimpleCommand;
use Erp\Bundle\OauthBundle\Domain\CQRS\OauthTokenOrCodeQuery as QueryInterface;

/**
 * {@inheritdoc}
 */
abstract class OauthTokenManager extends OauthTokenOrCodeManager implements TokenManagerInterface
{
    /**
     * {@inheritdoc}
     */
    // public function __construct(QueryInterface $query, SimpleCommand $command, UserProviderInterface $userProvider, ScopeProcessorRegistry $scopeProcessor)
    // {
    //     parent::__construct($query, $command, $userProvider, $scopeProcessor);
    // }

    /**
     * {@inheritdoc}
     */
    public function createToken()
    {
        return $this->createTokenOrCode();
    }

    /**
     * {@inheritdoc}
     */
    public function findTokenBy(array $criteria)
    {
        return $this->findTokenOrCodeBy($criteria);
    }

    /**
     * {@inheritdoc}
     */
    public function findTokenByToken($token)
    {
        return $this->findTokenOrCodeByToken($token);
    }

    /**
     * {@inheritdoc}
     */
    public function updateToken(TokenInterface $token)
    {
        $this->updateTokenOrCode($token);
    }

    /**
     * {@inheritdoc}
     */
    public function deleteToken(TokenInterface $token)
    {
        $this->deleteTokenOrCode($token);
    }
}
