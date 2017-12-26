<?php

namespace Erp\Bundle\OauthBundle\Infrastructure\Service;

use FOS\OAuthServerBundle\Model\AuthCodeInterface;
use Erp\Bundle\CoreBundle\Domain\CQRS\CQRSContainer;
use Erp\Bundle\OauthBundle\Domain\Service\OauthAuthCodeService as ServiceInterface;
use FOS\OAuthServerBundle\Model\ClientManagerInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * Oauth Auth Code Service
 */
class OauthAuthCodeService implements ServiceInterface{
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

  public function createAuthCode(){
    return $this->cqrs->query()->create();
  }

  public function getClass(){
    return $this->cqrs->query()->getClassName();
  }

  public function findAuthCodeBy(array $criteria){
    $token =  $this->cqrs->query()->fineOneBy($criteria);
    $token->setUser($this->userProvider->loadUserByUsername($token->getUserId()));
    $token->setClient($this->clientManager->findClientByPublicId($token->getClientId()));
    return $token;
  }

  public function findAuthCodeByToken($token){
    return $this->cqrs->query()->fineOneBy(['token' => $token]);
  }

  public function updateAuthCode(AuthCodeInterface $authCode){
    $this->cqrs->command()->save($authCode);
  }

  public function deleteAuthCode(AuthCodeInterface $authCode){
    $this->cqrs->command()->delete($authcode);
  }

  public function deleteExpired(){
    return $this->cqrs->command()->deleteExpired();
  }
}
