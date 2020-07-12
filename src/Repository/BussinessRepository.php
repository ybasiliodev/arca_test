<?php

namespace App\Repository;

use App\Entity\Bussiness;
use App\Entity\BussinessCategories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bussiness|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bussiness|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bussiness[]    findAll()
 * @method Bussiness[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BussinessRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bussiness::class);
    }

    /**
     * @return Bussiness[]
     */
    public function findbyText($title)
    {
        $bussinessResult = $this->createQueryBuilder('b')
            ->where('b.title like :title')
            ->orWhere('b.zip_code LIKE :title')
            ->orWhere('b.address LIKE :title')
            ->orWhere('b.city LIKE :title')
            ->orWhere('c.name LIKE :title')
            ->setParameter('title', '%'. $title . '%')
            ->select('distinct b.id, b.title')
            ->leftJoin('App\Entity\BussinessCategories', 'bc', Join::WITH, 'bc = b.id')
            ->leftJoin('App\Entity\Category', 'c', Join::WITH, 'c = bc.category_id')
            ->getQuery()  
            ->getResult();


        for($i = 0; $i < sizeof($bussinessResult); $i++) {
            $concat_categories = null;

            $categories = $this->createQueryBuilder('b')
            ->where('b.id = :id')
            ->setParameter('id', $bussinessResult[$i]['id'])
            ->select('c.name')
            ->leftJoin('App\Entity\BussinessCategories', 'bc', Join::WITH, 'bc = b.id')
            ->leftJoin('App\Entity\Category', 'c', Join::WITH, 'c = bc.category_id')
            ->getQuery()
            ->getResult();

            foreach ($categories as $cat) {
                $concat_categories .= ($concat_categories) ? ' - ' . $cat['name'] : $cat['name'];
            }

           $bussinessResult[$i]['categories'] = $concat_categories;
        }

        return $bussinessResult;
    }

        /**
     * @return Bussiness[]
     */
    public function findBussinessByID($id)
    {
        $bussinessResult = $this->createQueryBuilder('b')
            ->where('b.id = :id')
            ->setParameter('id', $id)
            ->select('b')
            ->getQuery()  
            ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);

            $concat_categories = null;

            $categories = $this->createQueryBuilder('b')
            ->where('b.id = :id')
            ->setParameter('id', $bussinessResult[0]['id'])
            ->select('c.name')
            ->leftJoin('App\Entity\BussinessCategories', 'bc', Join::WITH, 'bc = b.id')
            ->leftJoin('App\Entity\Category', 'c', Join::WITH, 'c = bc.category_id')
            ->getQuery()
            ->getResult();

            foreach ($categories as $cat) {
                $concat_categories .= ($concat_categories) ? ' - ' . $cat['name'] : $cat['name'];
            }

           $bussinessResult[0]['categories'] = $concat_categories;

        return $bussinessResult;
    }

           /**
     * @return Bussiness[]
     */
    public function findAllBussiness()
    {
        $bussinessResult = $this->createQueryBuilder('b')
            ->select('b')
            ->getQuery()
            ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);

        for($i = 0; $i < sizeof($bussinessResult); $i++) {
                $concat_categories = null;
    
                $categories = $this->createQueryBuilder('b')
                ->where('b.id = :id')
                ->setParameter('id', $bussinessResult[$i]['id'])
                ->select('c.name')
                ->leftJoin('App\Entity\BussinessCategories', 'bc', Join::WITH, 'bc = b.id')
                ->leftJoin('App\Entity\Category', 'c', Join::WITH, 'c = bc.category_id')
                ->getQuery()
                ->getResult();
    
                foreach ($categories as $cat) {
                    $concat_categories .= ($concat_categories) ? ' - ' . $cat['name'] : $cat['name'];
                }
    
               $bussinessResult[$i]['categories'] = $concat_categories;
            }
    
            return $bussinessResult;
    }

    /*
    public function findOneBySomeField($value): ?Bussiness
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
