<?php
namespace Erp\Bundle\OauthBundle\Entity;

use FOS\OAuthServerBundle\Entity\AccessToken as FOSAccessToken;
use FOS\OAuthServerBundle\Model\ClientInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Oauth Access Token Entity
 */
class OauthAccessToken extends FOSAccessToken{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $clientId;

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var string
     */
    protected $userId;

    /**
     * @var UserInterface
     */
    protected $user;

    function getClinetId(){
      return $this->clientId;
    }

    function setClient(ClientInterface $client){
      $this->clientId = $client->getPublicId();
      $this->client = $client;
    }

    function getUserId(){
      return $this->userId;
    }

    function setUser(UserInterface $user){
      $this->userId = $user->getUsername();
      $this->user = $user;
    }
}
