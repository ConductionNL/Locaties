<?php

namespace App\Repository;

use App\Entity\AccommodationProperty;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AccommodationProperty|null find($id, $lockMode = null, $lockVersion = null)
 * @method AccommodationProperty|null findOneBy(array $criteria, array $orderBy = null)
 * @method AccommodationProperty[]    findAll()
 * @method AccommodationProperty[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccommodationPropertyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AccommodationProperty::class);
    }

    // /**
    //  * @return AccommodationProp[] Returns an array of AccommodationProp objects
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
    public function findOneBySomeField($value): ?AccommodationProp
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
