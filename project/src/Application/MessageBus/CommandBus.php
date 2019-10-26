<?php


namespace App\Application\MessageBus;

use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Class CommandBus
 * @package App\Application\MessageBus
 */
class CommandBus
{
    /**
     * @var MessageBusInterface
     */
    private $messageBus;

    /**
     * CommandBus constructor.
     * command.bus: autowireable with the MessageBusInterface type-hint (because this is the default_bus)
     * @param MessageBusInterface $messageBus
     */
    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    /**
     * @param $command
     */
    public function handle($command)
    {
        $this->messageBus->dispatch($command);
    }
}