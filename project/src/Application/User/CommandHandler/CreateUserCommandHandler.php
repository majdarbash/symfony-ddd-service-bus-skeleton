<?php


namespace App\Application\User\CommandHandler;


use App\Application\MessageBus\EventBus;
use App\Application\User\Command\CreateUserCommand;
use App\Domain\User\Contract\UserRepositoryInterface;
use App\Domain\User\Entity\User;
use App\Domain\User\Event\UserCreatedEvent;

/**
 * Class CreateUserCommandHandler
 * @package App\Application\User\CommandHandler
 */
class CreateUserCommandHandler
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;
    /**
     * @var EventBus
     */
    private $eventBus;


    /**
     * CreateUserCommandHandler constructor.
     * @param UserRepositoryInterface $userRepository
     * @param EventBus $eventBus
     */
    public function __construct(UserRepositoryInterface $userRepository, EventBus $eventBus)
    {
        $this->userRepository = $userRepository;
        $this->eventBus = $eventBus;
    }

    /**
     * @param CreateUserCommand $createUserCommand
     */
    public function __invoke(CreateUserCommand $createUserCommand)
    {
        $user = new User();
        $user->setId($createUserCommand->getId());
        $user->setEmail($createUserCommand->getEmail());
        $user->setFullName($createUserCommand->getFullName());

        $this->userRepository->add($user);

        $this->eventBus->dispatch(new UserCreatedEvent(
            $user->getId(),
            $user->getEmail(),
            $user->getFullName(),
            $createUserCommand->getCreatedAt()
        ));
    }


}