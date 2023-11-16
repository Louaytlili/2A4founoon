<?php
class User
{
    private ?int $idUser = null;
    private ?string $username = null;
    private ?string $email = null;
    private ?string $password = null;

    public function __construct($id = null, $n, $a, $d)
    {
        $this->idUser = $id;
        $this->username = $n;
        $this->email = $a;
        $this->password = $d;
    }


    public function getId()
    {
        return $this->idUser;
    }


    public function getUsername()
    {
        return $this->username;
    }


    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}
