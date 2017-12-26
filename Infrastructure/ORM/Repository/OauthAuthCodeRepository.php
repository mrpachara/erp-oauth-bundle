<?php

namespace Erp\Bundle\OauthBundle\Infrastructure\ORM\Repository;

use Erp\Bundle\CoreBundle\Infrastructure\ORM\Repository\ErpRepository;
use Erp\Bundle\OauthBundle\Domain\CQRS\OauthAuthCodeQuery as QueryInterface;
use Erp\Bundle\OauthBundle\Domain\CQRS\OauthAuthCodeCommand as CommandInterface;

/**
 * Oauth Auth Code Repository (ORM)
 */
class OauthAuthCodeRepository extends ErpRepository implements
  QueryInterface, CommandInterface{
  public function deleteExpired(){
    $qb = $this->createQueryBuilder('a');
    $qb
        ->delete()
        ->where('a.expiresAt < ?1')
        ->setParameters(array(1 => time()));

    return $qb->getQuery()->execute();
  }
}
