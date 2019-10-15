<?php

namespace App\Infrastructure\Repository;

use App\Domain\User\Contract\UserRepositoryInterface;
use App\Domain\User\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;

class UserRepository extends ServiceEntityRepository implements UserRepositoryInterface
{
    /**
     * @var EntityManager
     */
    private $entityManager;


    /**
     * UserRepository constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function add(User $user): User
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }

}