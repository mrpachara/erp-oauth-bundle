<?php

namespace Erp\Bundle\OauthBundle\Manager;

use FOS\OAuthServerBundle\Model\ClientManagerInterface;
use FOS\OAuthServerBundle\Model\ClientManager;
use FOS\OAuthServerBundle\Model\ClientInterface;

use Erp\Bundle\CoreBundle\Domain\CQRS\SimpleCommand;
use Erp\Bundle\OauthBundle\Domain\CQRS\OauthClientQuery as QueryInterface;

class OauthClientManager extends ClientManager implements ClientManagerInterface
{
    /** @var QueryInterface */
    protected $query;

    /** @var SimpleCommand */
    protected $command;

    /**
     * Constructor
     *
     * @param QueryInterface $query
     * @param SimpleCommand $command
     */
    public function __construct(QueryInterface $query, SimpleCommand $command)
    {
        $this->query = $query;
        $this->command = $command;
    }

    /**
     * {@inheritdoc}
     */
    public function createClient() {
        $class = $this->getClass();

        return new $class();
    }

    /**
     * {@inheritdoc}
     */
    public function getClass() {
        return $this->query->getClassName();
    }

    /**
     * {@inheritdoc}
     */
    public function findClientBy(array $criteria) {
        return $this->query->findOneBy($criteria);
    }

    /**
     * {@inheritdoc}
     */
    public function updateClient(ClientInterface $client) {
        $this->command->save($client);
    }

    /**
     * {@inheritdoc}
     */
    public function deleteClient(ClientInterface $client) {
        $this->command->delete($client);
    }
}
