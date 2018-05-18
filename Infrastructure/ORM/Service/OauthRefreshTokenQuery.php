<?php

namespace Erp\Bundle\OauthBundle\Infrastructure\ORM\Service;

use Erp\Bundle\OauthBundle\Domain\CQRS\OauthRefreshTokenQuery as QueryInterface;

abstract class OauthRefreshTokenQuery extends OauthTokenQuery implements QueryInterface
{
}
