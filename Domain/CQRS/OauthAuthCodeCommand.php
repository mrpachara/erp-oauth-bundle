<?php

namespace Erp\Bundle\OauthBundle\Domain\CQRS;

use Erp\Bundle\CoreBundle\Domain\CQRS\ErpCommand;

/**
 * Oauth Auth Code Command (CQRS)
 */
interface OauthAuthCodeCommand extends ErpCommand, ExpiredDeletable{ }
