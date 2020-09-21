<?php

namespace App\Repository;

use App\Entity\AdditionalInfoUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AdditionalInfoUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdditionalInfoUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdditionalInfoUser[]    findAll()
 * @method AdditionalInfoUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdditionalInfoUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdditionalInfoUser::class);
    }

    // /**
    //  * @return AdditionalInfoUser[] Returns an array of AdditionalInfoUser objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AdditionalInfoUser
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
