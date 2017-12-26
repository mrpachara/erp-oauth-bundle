<?php

namespace Erp\Bundle\OauthBundle\Infrastructure\Service;

use FOS\OAuthServerBundle\Model\ClientInterface;
use Erp\Bundle\CoreBundle\Domain\CQRS\CQRSContainer;
use Erp\Bundle\OauthBundle\Domain\Service\OauthClientService as ServiceInterface;

/**
 * Oauth Client Service
 */
class OauthAuthCodeService implements ServiceInterface{
  /** @var CQRSContainer */
  private $cqrs;

  /**
   * Constructor
   *
   * @param CQRSContainer $cqrs
   */
  public function __construct(CQRSContainer $cqrs){
    $this->cqrs = $cqrs;
  }

  public function createClient(){
    return $this->cqrs->query()->create();
  }

  public function getClass(){
    return $this->cqrs->query()->getClassName();
  }

  public function findClientBy(array $criteria){
    return $this->cqrs->query()->findOneBy($criteria);
  }

  public function findClientByPublicId($publicId){
    return $this->cqrs->query()->findOneByPublicId($publicId);
  }

  public function updateClient(ClientInterface $client){
    $this->cqrs->command()->save($client);
  }

  public function deleteClient(ClientInterface $client){
    $this->cqrs->command()->delete($client);
  }
}
