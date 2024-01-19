<?php
namespace App\Entity;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
# [ORM\Entity(repositoryClass: UserRepository::class)]
class User  implements PasswordAuthenticatedUserInterface
{
# [ORM\Id]
# [ORM\GeneratedValue]
# [ORM\Column(type: 'integer')]
protected string $id;  
# [ORM\Column(type: 'string', length: 255)]
protected string $firstname;
# [ORM\Column(type: 'string', length: 255)]
protected string $lastname;
# [ORM\Column(type: 'string')]
protected string $password;
# [ORM\Column(type: 'string', length: 180, unique: true)]
protected string $email;
# [ORM\Column(type: 'string')]
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