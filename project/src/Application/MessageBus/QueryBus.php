<?php


namespace App\Application\MessageBus;


use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Class QueryBus
 * @package App\Application\MessageBus
 */
class QueryBus
{
    /**
     * @var MessageBusInterface
     */
    private $messageBus;

    /**
     * QueryBus constructor.
     * query.bus: autowireable with MessageBusInterface $queryBus
     * @param MessageBusInterface $queryBus
     */
    public function __construct(MessageBusInterface $queryBus)
    {
        $this->messageBus = $queryBus;
    }

    /**
     * @param $query
     * @return mixed
     */
    public function query($query)
    {
        return $this->messageBus->dispatch($query);
    }
}