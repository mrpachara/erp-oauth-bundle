<?php

namespace Erp\Bundle\OauthBundle\Domain\CQRS;

use Erp\Bundle\CoreBundle\Domain\CQRS\ErpCommand;

/**
 * Oauth Token Command (CQRS)
 */
interface OauthTokenCommand extends ErpCommand, ExpiredDeletable{ }
