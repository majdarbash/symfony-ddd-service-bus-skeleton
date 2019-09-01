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
     * @param MessageBusInterface $messageBus
     */
    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
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