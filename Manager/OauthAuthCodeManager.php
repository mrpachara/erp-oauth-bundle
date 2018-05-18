<?php

namespace Erp\Bundle\OauthBundle\Manager;

use Symfony\Component\Security\Core\User\UserProviderInterface;

use FOS\OAuthServerBundle\Model\AuthCodeManagerInterface;
use FOS\OAuthServerBundle\Model\AuthCodeInterface;

use Erp\Bundle\CoreBundle\Domain\CQRS\SimpleCommand;
use Erp\Bundle\OauthBundle\Domain\CQRS\OauthTokenOrCodeQuery as QueryInterface;

class OauthAuthCodeManager extends OauthTokenOrCodeManager implements AuthCodeManagerInterface {
    /**
     * {@inheritdoc}
     */
    // public function __construct(QueryInterface $query, SimpleCommand $command, UserProviderInterface $userProvider)
    // {
    //     parent::__construct($query, $command, $userProvider);
    // }

    /**
     * {@inheritdoc}
     */
    public function createAuthCode(){
        return $this->createTokenOrCode();
    }

    /**
     * {@inheritdoc}
     */
    public function findAuthCodeBy(array $criteria) {
        return $this->findTokenOrCodeBy($criteria);
    }

    /**
     * {@inheritdoc}
     */
    public function findAuthCodeByToken($token) {
        return $this->findTokenOrCodeByToken($token);
    }

    /**
     * {@inheritdoc}
     */
    public function updateAuthCode(AuthCodeInterface $authCode){
        $this->updateTokenOrCode($authCode);
    }

    /**
     * {@inheritdoc}
     */
    public function deleteAuthCode(AuthCodeInterface $authCode) {
        $this->deleteTokenOrCode($authCode);
    }
}
