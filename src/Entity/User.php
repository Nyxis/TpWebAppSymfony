<?php

namespace App\Entity;
use AllowDynamicProperties;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[AllowDynamicProperties] class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    protected int $id;

    protected string $firstName;
    protected string $lastName;
    protected string $eMail;
    protected string $password;



    protected array $roles;

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function setEMail(string $eMail): void
    {
        $this->eMail = $eMail;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    public function __construct()
    {

    }


    public function setID(int $iD): void
    {
        $this->iD = $iD;
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

        return $this->roles;
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