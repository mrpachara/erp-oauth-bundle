<?php

namespace Erp\Bundle\OauthBundle\Infrastructure\Service;

use FOS\OAuthServerBundle\Model\TokenInterface;
use Erp\Bundle\CoreBundle\Domain\CQRS\CQRSContainer;
use Erp\Bundle\OauthBundle\Domain\Service\OauthAccessTokenService as OauthAccessTokenServiceInterface;
use Erp\Bundle\OauthBundle\Domain\Service\OauthRefreshTokenService as OauthRefreshTokenServiceInterface;
use FOS\OAuthServerBundle\Model\ClientManagerInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * Oauth Token Service
 */
class OauthTokenService implements
  OauthAccessTokenServiceInterface, OauthRefreshTokenServiceInterface{
  /** @var CQRSContainer */
  private $cqrs;

  /** @var UserProviderInterface */
  private $userProvider;

  /** @var ClientManagerInterface */
  private $clientManager;

  /**
   * Constructor
   *
   * @param CQRSContainer $cqrs
   * @param UserProviderInterface $userProvider
   * @param ClientManagerInterface $clientManager
   */
  public function __construct(
    CQRSContainer $cqrs,
    UserProviderInterface $userProvider,
    ClientManagerInterface $clientManager
  ){
    $this->cqrs = $cqrs;
    $this->userProvider = $userProvider;
    $this->clientManager = $clientManager;
  }

  public function createToken(){
    return $this->cqrs->query()->create();
  }

  public function getClass(){
    return $this->cqrs->query()->getClassName();
  }

  public function findTokenBy(array $criteria){
    $token = $this->cqrs->query()->findOneBy($criteria);
    $token->setUser($this->userProvider->loadUserByUsername($token->getUserId()));
    $token->setClient($this->clientManager->findClientByPublicId($token->getClientId()));
    return $token;
  }

  public function findTokenByToken($token){
    return $this->cqrs->query()->findTokenBy(['token' => $token]);
  }

  public function updateToken(TokenInterface $token){
    $this->cqrs->command()->save($token);
  }

  public function deleteToken(TokenInterface $token){
    $this->cqrs->command()->delete($token);
  }

  public function deleteExpired(){
    return $this->cqrs->command()->deleteExpired();
  }
}
