<?php

namespace App\Repository;

use App\Entity\Roles;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function findAllSuperAdmins()
    {
        return $this->findAllByRoles(Roles::SUPER_ADMIN);
    }

}
