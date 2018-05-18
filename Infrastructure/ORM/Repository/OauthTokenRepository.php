<?php

namespace Erp\Bundle\OauthBundle\Infrastructure\ORM\Repository;

use Erp\Bundle\CoreBundle\Infrastructure\ORM\Repository\ErpRepositoryOld;
use Erp\Bundle\OauthBundle\Domain\CQRS\OauthTokenQuery as QueryInterface;
use Erp\Bundle\OauthBundle\Domain\CQRS\OauthTokenCommand as CommandInterface;

/**
 * Oauth Token Repository (ORM)
 */
class OauthTokenRepository extends ErpRepositoryOld implements
  QueryInterface, CommandInterface{
  public function deleteExpired(){
    $qb = $this->createQueryBuilder('t');
    $qb
        ->delete()
        ->where('t.expiresAt < ?1')
        ->setParameters(array(1 => time()));

    return $qb->getQuery()->execute();
  }
}
