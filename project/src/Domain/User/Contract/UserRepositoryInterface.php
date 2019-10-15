<?php

namespace App\Domain\User\Contract;

use App\Domain\User\Entity\User;

interface UserRepositoryInterface
{
    public function add(User $user): User;

}