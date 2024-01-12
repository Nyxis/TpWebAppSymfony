<?php
namespace App\Security;

use symfony\Component\Security\Core\UserInterface;

class User implements UserInterface, PasswordAuthenticatedUserInterface{
    private int $id;
    
    private string $email;

    private string $password;
    
    public function __construct(email $email){
        $this->email = $email;
    }

    public function getEmail(): string{
        return $this -> email;
    }
    public function setEmail(string $email): self{
        $this ->email = $email;
        return $this;
    }
     /**
     * The public representation of the user (e.g. a username, an email address, etc.)
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string{
        return (string) $this -> $email;
    }
    /**
     * @see UserInterface
     */
    public function getRoles(): array{
        $roles = $this ->roles;
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }
    public function setRoles(array $roles): self{
        $this ->roles =$roles;
        return $this;
    }
     /**
     * @see PasswordAuthenticatedUserInterface
     */
    // public function __construct(password $password){
    //     $this -> password = $password;
    // }
    public function getPassword(): string{
        return $this->password;
    }
    public function setPassword(string $password): self{
        $this-> password = $password;
        return $this;
    }
    public function ereaseCredentials(): void{
        $this-> password = null;
    }
}