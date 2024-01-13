<?php
namespace App\Security;

use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    protected $email;
    protected $firstname;
    protected $lastname;
  

     public function __construct(
        string $email,
        protected string $password //hashed password
     )
     {
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->$password = $password;

     }
   
/**
     * The public representation of the user (e.g. a username, an email address, etc.)
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }
    public function getUserFistName(): string
    {
        return (string) $this->firstname;
    }
    public function getUserLastName(): string
    {
        return (string) $this->lastname;
    }
    public function getUserPassword(): string
    {
        return (string) $this->password;
    }
/**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

 /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

}

?>