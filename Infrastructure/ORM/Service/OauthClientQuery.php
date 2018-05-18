<?php

namespace Erp\Bundle\OauthBundle\Infrastructure\ORM\Service;

use Erp\Bundle\CoreBundle\Infrastructure\ORM\Service\ErpQuery as ParentQuery;
use Erp\Bundle\OauthBundle\Domain\CQRS\OauthClientQuery as QueryInterface;

abstract class OauthClientQuery extends ParentQuery implements QueryInterface
{
}
