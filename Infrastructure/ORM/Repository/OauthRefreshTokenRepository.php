<?php

namespace Erp\Bundle\OauthBundle\Infrastructure\ORM\Repository;

use Erp\Bundle\CoreBundle\Infrastructure\ORM\Repository\ErpRepository;
use Erp\Bundle\OauthBundle\Domain\CQRS\OauthRefreshTokenQuery as QueryInterface;
use Erp\Bundle\OauthBundle\Domain\CQRS\OauthRefreshTokenCommand as CommandInterface;

/**
 * Oauth Refresh Token Repository (ORM)
 */
class OauthRefreshTokenRepository extends ErpRepository implements
  QueryInterface, CommandInterface{ }
