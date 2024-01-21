<?php
            namespace App\Repository;

            use App\Entity\UserAccount;
            use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
            use Doctrine\Persistence\ManagerRegistry;


            class UserDoctrineRepository extends ServiceEntityRepository
            {
                public function __construct(ManagerRegistry $registry)
                {
                    parent::__construct($registry, UserAccount::class);
                }

            }
