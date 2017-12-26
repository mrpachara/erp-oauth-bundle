<?php

namespace Erp\Bundle\OauthBundle\Infrastructure\ORM\Repository;

use Erp\Bundle\CoreBundle\Infrastructure\ORM\Repository\ErpRepository;
use Erp\Bundle\OauthBundle\Domain\CQRS\OauthTokenQuery as QueryInterface;
use Erp\Bundle\OauthBundle\Domain\CQRS\OauthTokenCommand as CommandInterface;

/**
 * Oauth Token Repository (ORM)
 */
class OauthTokenRepository extends ErpRepository implements
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
