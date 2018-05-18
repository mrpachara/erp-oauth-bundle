<?php

namespace Erp\Bundle\OauthBundle\Infrastructure\ORM\Service;

use Erp\Bundle\OauthBundle\Domain\CQRS\OauthAccessTokenQuery as QueryInterface;

abstract class OauthAccessTokenQuery extends OauthTokenQuery implements QueryInterface
{
}
