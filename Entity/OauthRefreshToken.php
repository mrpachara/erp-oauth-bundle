<?php
namespace Erp\Bundle\OauthBundle\Entity;

use FOS\OAuthServerBundle\Entity\RefreshToken as BaseRefreshToken;
use Symfony\Component\Security\Core\User\UserInterface;

use Erp\Bundle\SystemBundle\Entity\SystemUser;

/**
 * Oauth Refresh Token Entity
 */
class OauthRefreshToken extends BaseRefreshToken
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
