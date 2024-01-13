<?php

namespace App\Entity;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface, PasswordAuthenticatedUserInterface
{



    protected string $firstName;
    protected string $lastName;
    protected string $eMail;
    protected string $password;
    protected array $roles;

    public function __construct()
    {

    }
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }
    public function getEMail(): string
    {
        return $this->eMail;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRoles(): array
    {

        return [$this->roles];
    }

    public function eraseCredentials(): void
    {
        // TODO: Implement eraseCredentials() method.
        return;
    }

    public function getUserIdentifier(): string
    {
        return $this->eMail ;
    }

}