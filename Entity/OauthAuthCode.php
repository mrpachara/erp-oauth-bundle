<?php
namespace Erp\Bundle\OauthBundle\Entity;

use FOS\OAuthServerBundle\Entity\AuthCode as BaseAuthCode;
use Symfony\Component\Security\Core\User\UserInterface;

use Erp\Bundle\SystemBundle\Entity\SystemUser;

/**
 * Oauth Authorization Code Entity
 */
class OauthAuthCode extends BaseAuthCode
{
    /** @var string */
    protected $id;

    /** @var OauthClient */
    protected $client;

    /** @var string */
    protected $username;

    /** @var SystemUser */
    protected $user;

    /**
     * Get User ID
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * {@inheritDoc}
     */
    public function setUser(UserInterface $user)
    {
        $this->username = $user->getUsername();
        $this->user = $user;
    }
}
