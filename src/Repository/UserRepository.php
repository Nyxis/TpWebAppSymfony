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

    public function findAllByRoles(array $roles = [])
    {
        $queryBuilder = $this->createQueryBuilder('u')
            ->orderBy('u.firstname', 'ASC');

        if (!empty($roles)) {
            $expressionBuilder = $queryBuilder->expr();
            $orExpression = $expressionBuilder->orX();

            foreach ($roles as $role) {
                $orExpression->add($expressionBuilder->like('u.roles', $expressionBuilder->literal('%' . $role . '%')));
            }

            $queryBuilder->andWhere($orExpression);
        }

        return $queryBuilder->getQuery()->getResult();
    }
    public function findAllEmails()
    {
        $query = $this->createQueryBuilder('u')
            ->select('u.email')
            ->getQuery();

        return $query->getResult();
    }

}
