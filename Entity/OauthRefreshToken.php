<?php
namespace Erp\Bundle\OauthBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Erp\Bundle\SystemBundle\Model\SystemClientInterface;
use Erp\Bundle\SystemBundle\Model\SystemUserInterface;

use FOS\OAuthServerBundle\Entity\RefreshToken as BaseRefreshToken;

/**
 * @ORM\Entity
 * @ORM\Table(name="oauth.refreshtoken")
 */
class OauthRefreshToken extends BaseRefreshToken{
    /**
     * @ORM\Id
     * @ORM\Column(type="bigint")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     * @var string
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Erp\Bundle\SystemBundle\Entity\SystemClient")
     * @ORM\JoinColumn(nullable=false)
     *
     * @var SystemClientInterface
     */
    protected $client;

    /**
     * @ORM\ManyToOne(targetEntity="Erp\Bundle\SystemBundle\Entity\SystemUser")
     *
     * @var SystemUserInterface
     */
    protected $user;
}
