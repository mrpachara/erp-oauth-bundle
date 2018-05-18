<?php

namespace Erp\Bundle\OauthBundle\Infrastructure\ORM\Service;

use Doctrine\ORM\EntityRepository;

use Erp\Bundle\OauthBundle\Domain\CQRS\OauthTokenQuery as QueryInterface;
use Erp\Bundle\CoreBundle\Infrastructure\ORM\Service\ErpQuery as ParentQuery;

abstract class OauthTokenQuery extends ParentQuery implements QueryInterface
{
}
