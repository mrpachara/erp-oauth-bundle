<?php

namespace Erp\Bundle\OauthBundle\Infrastructure\ORM\Service;

use Erp\Bundle\OauthBundle\Domain\CQRS\OauthAuthCodeQuery as QueryInterface;

abstract class OauthAuthCodeQuery extends OauthTokenQuery implements QueryInterface
{
}
