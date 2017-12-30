<?php

namespace  Romss\Entities;

class Users extends Entity
{
    private $id,
            $name,
            $password,
            $email,
            $email_token,
            $register_at,
            $connection_at,
            $rank;

        public  function __construct($id, $name, $password, $email, $email_token, $register_at, $connection_at, $rank)
    {
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
        $this->email_token = $email_token;
        $this->register_at = $register_at;
        $this->connection_at = $connection_at;
        $this->rank = $rank;
    }

    //SETTERS

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = (int) $id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $email_token
     */
    public function setEmailToken($email_token)
    {
        $this->email_token = $email_token;
    }

    /**
     * @param mixed $register_at
     */
    public function setRegisterAt($register_at)
    {
        $this->register_at = $register_at;
    }

    /**
     * @param mixed $connection_at
     */
    public function setConnectionAt($connection_at)
    {
        $this->connection_at = $connection_at;
    }

    /**
     * @param int $rank
     */
    public function setRank($rank)
    {
        $this->rank = (int) $rank;
    }

    //GETTERS

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
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
    public function getEmailToken()
    {
        return $this->email_token;
    }

    /**
     * @return mixed
     */
    public function getRegisterAt()
    {
        return $this->register_at;
    }

    /**
     * @return mixed
     */
    public function getConnectionAt()
    {
        return $this->connection_at;
    }

    /**
     * @return int
     */
    public function getRank()
    {
        return $this->rank;
    }


}