<?php


namespace App\Application\MessageBus;


use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Class EventBus
 * @package App\Application\MessageBus
 */
class EventBus
{
    /**
     * @var MessageBusInterface
     */
    private $messageBus;

    /**
     * EventBus constructor.
     * @param MessageBusInterface $messageBus
     */
    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    /**
     * @param $event
     * @return mixed
     */
    public function dispatch($event)
    {
        return $this->messageBus->dispatch($event);
    }
}