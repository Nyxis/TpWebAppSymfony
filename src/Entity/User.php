<?php
namespace App\Entity;

class User
{
protected string $firstname;
protected string $lastname;
protected string $password;
protected string $email;
protected string $roles;


   

    public function getFirstName(): string
    {
        return $this->firstname;
    }

    public function setFirstName(string $firstname): void
    {
        $this->firstname = $firstname;
    }
    public function getLastName(): string
    {
        return $this->lastname;
    }

    public function setLastName(string $lastname): void
    {
        $this->lastname = $lastname;
    }
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function getRoles(): string
    {
        return $this->roles;
    }

    public function setRoles(string $roles): void
    {
        $this->roles = $roles;
    }

 
}
?>