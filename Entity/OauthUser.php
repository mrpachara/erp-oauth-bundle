<?php
namespace Erp\Bundle\OauthBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface as SymfonyUserInterface;

/**
 * Oauth User for Token Entity
 */
class OauthUser implements SymfonyUserInterface{
  /** @var string */
  protected $id;

  /** @var string */
  protected $username;

  /** @var array<string> */
  protected $roles;

  public function getRoles(){
    return $this->roles;
  }

  public function getPassword(){
    return null;
  }

  public function getSalt(){
    return null;
  }

  public function getUsername(){
    return $this->username;
  }

  public function eraseCredentials(){ }
}
