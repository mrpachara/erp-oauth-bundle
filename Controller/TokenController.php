<?php

namespace Erp\Bundle\OauthBundle\Controller;

use Symfony\Component\Security\Core\User\UserInterface;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;

/**
 * CoreAccount Api Controller
 *
 * @Rest\Version("1.0")
 * @Rest\Route("/api/token")
 */
class TokenController extends FOSRestController
{
    /**
     * Get Info action
     *
     * @Rest\Get("/info")
     */
    public function getAction(UserInterface $user = null)
    {
        return $this->view([
          'data' => $user,
      ]);
    }
}
