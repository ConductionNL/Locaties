<?php

namespace App\Repository;

use App\Entity\PlaceProperty;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlaceProperty|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlaceProperty|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlaceProperty[]    findAll()
 * @method PlaceProperty[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlacePropertyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlaceProperty::class);
    }

    // /**
    //  * @return PlaceProp[] Returns an array of PlaceProp objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PlaceProp
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
