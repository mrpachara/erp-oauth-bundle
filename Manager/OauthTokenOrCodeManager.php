<?php

namespace Erp\Bundle\OauthBundle\Manager;

use Symfony\Component\Security\Core\User\UserProviderInterface;

use FOS\OAuthServerBundle\Model\TokenManagerInterface;
use FOS\OAuthServerBundle\Model\TokenInterface;

use Erp\Bundle\CoreBundle\Domain\CQRS\SimpleCommand;
use Erp\Bundle\OauthBundle\Domain\CQRS\OauthTokenOrCodeQuery as QueryInterface;

use Erp\Bundle\OauthBundle\Processor\ScopeProcessorRegistry;

/**
 * Token or Code Manager
 */
abstract class OauthTokenOrCodeManager
{
    /** @var QueryInterface */
    protected $query;

    /** @var SimpleCommand */
    protected $command;

    /** @var UserProviderInterface */
    protected $userProvider;

    /** @var ScopeProcessorRegistry */
    protected $scopeProcessor;

    /**
     * Constructor
     *
     * @param QueryInterface $query
     * @param SimpleCommand $command
     * @param UserProviderInterface $userProvider
     * @param ScopeProcessorRegistry $scopeProcessor
     */
    public function __construct(QueryInterface $query, SimpleCommand $command, UserProviderInterface $userProvider, ScopeProcessorRegistry $scopeProcessor)
    {
        $this->query = $query;
        $this->command = $command;
        $this->userProvider = $userProvider;
        $this->scopeProcessor = $scopeProcessor;
    }

    protected function createTokenOrCode()
    {
        $class = $this->getClass();

        return new $class();
    }

    public function getClass()
    {
        return $this->query->getClassName();
    }

    protected function findTokenOrCodeBy(array $criteria)
    {
        $tokenOrCode = $this->query->findOneBy($criteria);

        if(!empty($tokenOrCode)) {
            $this->scopeProcessor->process($tokenOrCode->getScope());
            $tokenOrCode->setUser($this->userProvider->loadUserByUsername($tokenOrCode->getUsername()));
        }

        return $tokenOrCode;
    }

    protected function findTokenOrCodeByToken($tokenOrCode)
    {
        return $this->findTokenOrCodeBy(['token' => $tokenOrCode]);
    }

    protected function updateTokenOrCode($tokenOrCode)
    {
        $this->command->save($tokenOrCode);
    }

    protected function deleteTokenOrCode($tokenOrCode)
    {
        $this->command->delete($tokenOrCode);
    }

    public function deleteExpired()
    {
        $qb = $this->command->createQueryBuilder();
        $qb
            ->delete($this->query->getClassName(), '_tokenOrCode')
            ->where('_tokenOrCode.expiresAt < ?1')
            ->setParameters([1 => time()])
        ;

        return $qb->getQuery()->execute();
        // $qb = $this->repository->createQueryBuilder('t');
        // $qb
        //     ->delete()
        //     ->where('t.expiresAt < ?1')
        //     ->setParameters([1 => time()])
        // ;
        //
        // return $qb->getQuery()->execute();
    }
}
