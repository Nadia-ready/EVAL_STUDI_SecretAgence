<?php

namespace App\Repository;

use App\Entity\TypesMission;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypesMission|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypesMission|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypesMission[]    findAll()
 * @method TypesMission[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypesMissionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypesMission::class);
    }

    // /**
    //  * @return TypesMission[] Returns an array of TypesMission objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypesMission
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
