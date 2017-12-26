<?php

namespace Erp\Bundle\OauthBundle\Domain\CQRS;

/**
 * Expired deletable
 */
interface ExpiredDeletable{
  /**
   * Delete expired tokens.
   *
   * @return int The number of tokens deleted.
   */
  public function deleteExpired();
}
