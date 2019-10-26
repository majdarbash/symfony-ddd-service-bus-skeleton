<?php

namespace App\Console;

use DateTime, Exception;
use App\Application\MessageBus\CommandBus;
use App\Application\User\Command\CreateUserCommand;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserConsoleCommand extends Command
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;

        parent::__construct('app:create-user');
    }


    protected function configure()
    {
        $this->addArgument('full_name', InputArgument::REQUIRED);
        $this->addArgument('email', InputArgument::REQUIRED);
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('');
        $output->writeln('Creating user with provided information:');
        $output->writeln('
            Full Name: ' . $input->getArgument('full_name') . '
            Email: ' . $input->getArgument('email')
        );

        $output->writeln('
            This command will be queued and will run asynchronously
            Follow README.md file to understand how it\'s achieved
        ');

        try {
            $userId = Uuid::uuid4();
        } catch (Exception $e) {
            $output->writeln('Error generating request id: ' . $e->getMessage());
            return;
        }

        $command = new CreateUserCommand(
            $userId,
            $input->getArgument('email'),
            $input->getArgument('full_name'),
            new DateTime('now')
        );

        $this->commandBus->handle($command);


        $output->writeln('Request accepted: ' . $userId->toString());
    }


}