<?php

namespace App\Repository;

use App\Entity\FunctieToPerson;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FunctieToPerson|null find($id, $lockMode = null, $lockVersion = null)
 * @method FunctieToPerson|null findOneBy(array $criteria, array $orderBy = null)
 * @method FunctieToPerson[]    findAll()
 * @method FunctieToPerson[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FunctieToPersonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FunctieToPerson::class);
    }

    // /**
    //  * @return FunctieToPerson[] Returns an array of FunctieToPerson objects
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
    public function findOneBySomeField($value): ?FunctieToPerson
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
