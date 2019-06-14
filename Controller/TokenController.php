<?php
namespace Erp\Bundle\OauthBundle\Controller;

use Symfony\Component\Security\Core\User\UserInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Erp\Bundle\CoreBundle\Domain\CQRS\Query\CoreAccountQuery;

/**
 * CoreAccount Api Controller
 *
 * @Rest\Version("1.0")
 * @Rest\Route("/api/token")
 */
class TokenController
{

    private $query;

    public function __construct(CoreAccountQuery $query)
    {
        $this->query = $query;
    }

    /**
     * Get Info action
     *
     * @Rest\Get("/info")
     */
    public function getAction(UserInterface $user = null)
    {
        return [
            'data' => $user,
            'relates' => $this->query->getRelatedAccount($user)
        ];
    }
}
