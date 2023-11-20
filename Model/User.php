<?php
class User
{
    private ?int $idUser = null;
    private ?string $username = null;      //?maaneha ya type ya null
    private ?string $email = null;
    private ?string $password = null;
    private string $registered_at;    // meghir? non  null
    private int $isAdmin = 0;
    
    /*
    public function __construct($id = null, $n, $a, $d,$r,$i)
    {
        $this->idUser = $id;
        $this->username = $n;
        $this->email = $a;
        $this->password = $d;
        $this->registered_at = $r;
        $this->isAdmin = $i;
    }
    */
    
    public function __construct(?int $id, string $n, string $a, string $d, string $r, int $i)
    {
        $this->idUser = $id;
        $this->username = $n;
        $this->email = $a;
        $this->password = $d;
        $this->registered_at = $r;
        $this->isAdmin = $i;
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

    public function getIsAdmin():int
    {
        return $this->isAdmin;
    }

    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
        return $this;
    }

    public function getRegisteredAt()
    {
        return $this->registered_at;
    }

    public function setRegisteredAt($registered_at)
    {
        $this->registered_at = $registered_at;
        return $this;
    }
     

}
