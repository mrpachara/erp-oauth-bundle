<?php

namespace Erp\Bundle\OauthBundle\Infrastructure\ORM\Repository;

use Erp\Bundle\OauthBundle\Domain\CQRS\OauthAccessTokenQuery as QueryInterface;
use Erp\Bundle\OauthBundle\Domain\CQRS\OauthAccessTokenCommand as CommandInterface;

/**
 * Oauth Access Token Repository (ORM)
 */
class OauthAccessTokenRepository extends OauthTokenRepository implements
  QueryInterface, CommandInterface{ }
