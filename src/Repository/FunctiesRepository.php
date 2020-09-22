<?php

namespace App\Repository;

use App\Entity\Functies;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Functies|null find($id, $lockMode = null, $lockVersion = null)
 * @method Functies|null findOneBy(array $criteria, array $orderBy = null)
 * @method Functies[]    findAll()
 * @method Functies[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FunctiesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Functies::class);
    }

    // /**
    //  * @return Functies[] Returns an array of Functies objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Functies
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
