<?php
namespace Erp\Bundle\OauthBundle\Entity;

use FOS\OAuthServerBundle\Entity\Client as BaseClient;

/**
 * Oauth Client for Token Entity
 */
class OauthClient extends BaseClient{
  /** @var string */
  protected $id;
}
