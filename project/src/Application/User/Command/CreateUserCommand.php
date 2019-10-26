<?php

namespace App\Application\User\Command;

use Symfony\Component\Validator\Constraints as Assert;


class CreateUserCommand
{
    /**
     * @Assert\Uuid()
     * @Assert\NotBlank()
     */
    private $id;

    /**
     * @Assert\NotBlank()
     */
    private $email;

    /**
     * @Assert\NotBlank()
     */
    private $full_name;

    /**
     * @Assert\NotBlank()
     */
    private $created_at;

    /**
     * CreateUserCommand constructor.
     * @param $id
     * @param $email
     * @param $full_name
     * @param $created_at
     */
    public function __construct($id, $email, $full_name, $created_at)
    {
        $this->id = $id;
        $this->email = $email;
        $this->full_name = $full_name;
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->full_name;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }



}