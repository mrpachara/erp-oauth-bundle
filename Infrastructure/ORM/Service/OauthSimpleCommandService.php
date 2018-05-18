<?php

namespace Erp\Bundle\OauthBundle\Infrastructure\ORM\Service;

use Erp\Bundle\OauthBundle\Domain\CQRS\OauthSimpleCommand as CommandInterface;
use Erp\Bundle\CoreBundle\Infrastructure\ORM\Service\SimpleCommandService as Command;

class OauthSimpleCommandService extends Command implements CommandInterface
{
}
