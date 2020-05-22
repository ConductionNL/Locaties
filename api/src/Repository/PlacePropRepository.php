<?php

namespace App\Repository;

use App\Entity\PlaceProp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlaceProp|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlaceProp|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlaceProp[]    findAll()
 * @method PlaceProp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlacePropRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlaceProp::class);
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
