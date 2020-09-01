<?php

require_once 'Person.class.php';

class Workers extends Person
{

    private $id_worker;
    private $role;
    private $login;
    private $password;
    private $birthday;
    private $hiring_date;
    private $operations;

    /**
     * Workers constructor.
     * @param $firstName
     * @param $lastName
     * @param $email
     * @param $role
     * @param $login
     * @param $password
     * @param $birthday
     * @param $hiring_date
     * @param $operations
     */
    public function __construct($firstName, $lastName, $email, $role, $login, $password, $birthday, $hiring_date, $operations)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;

        $this->role = $role;
        $this->login = $login;
        $this->password = $password;
        $this->birthday = $birthday;
        $this->hiring_date = $hiring_date;
        $this->operations = $operations;

    }

    /**
     * @return int
     */
    public function getIdWorker(): int
    {
        return $this->id_worker;
    }

    /**
     * @param int $id_worker
     */
    public function setIdWorker(int $id_worker): void
    {
        $this->id_worker = $id_worker;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role): void
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login): void
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday): void
    {
        $this->birthday = $birthday;
    }

    /**
     * @return mixed
     */
    public function getHiringDate()
    {
        return $this->hiring_date;
    }

    /**
     * @param mixed $hiring_date
     */
    public function setHiringDate($hiring_date): void
    {
        $this->hiring_date = $hiring_date;
    }

    /**
     * @return mixed
     */
    public function getOperations()
    {
        return $this->operations;
    }

    /**
     * @param mixed $operations
     */
    public function setOperations($operations): void
    {
        $this->operations = $operations;
    }



}