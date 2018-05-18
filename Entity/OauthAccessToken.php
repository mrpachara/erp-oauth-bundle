<?php
namespace Erp\Bundle\OauthBundle\Entity;

use FOS\OAuthServerBundle\Entity\AccessToken as FOSAccessToken;
use Symfony\Component\Security\Core\User\UserInterface;

use Erp\Bundle\SystemBundle\Entity\SystemUser;

/**
 * Oauth Access Token Entity
 */
class OauthAccessToken extends FOSAccessToken
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
