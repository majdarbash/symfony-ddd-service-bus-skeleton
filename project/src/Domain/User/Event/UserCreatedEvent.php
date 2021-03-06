<?php


namespace App\Domain\User\Event;

class UserCreatedEvent
{
    private $id;
    private $email;
    private $created_at;
    private $full_name;

    /**
     * UserCreatedEvent constructor.
     * @param $id
     * @param $email
     * @param $created_at
     * @param $full_name
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
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->full_name;
    }


}