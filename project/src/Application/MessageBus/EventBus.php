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
     * event.bus: autowireable with MessageBusInterface $eventBus
     * @param MessageBusInterface $eventBus
     */
    public function __construct(MessageBusInterface $eventBus)
    {
        $this->messageBus = $eventBus;
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