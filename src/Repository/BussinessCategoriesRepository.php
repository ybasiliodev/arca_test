<?php

namespace App\Repository;

use App\Entity\BussinessCategories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BussinessCategories|null find($id, $lockMode = null, $lockVersion = null)
 * @method BussinessCategories|null findOneBy(array $criteria, array $orderBy = null)
 * @method BussinessCategories[]    findAll()
 * @method BussinessCategories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BussinessCategoriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BussinessCategories::class);
    }

    // /**
    //  * @return BussinessCategories[] Returns an array of BussinessCategories objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BussinessCategories
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
