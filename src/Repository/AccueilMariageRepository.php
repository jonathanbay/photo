<?php

namespace App\Repository;

use App\Entity\AccueilMariage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AccueilMariage>
 *
 * @method AccueilMariage|null find($id, $lockMode = null, $lockVersion = null)
 * @method AccueilMariage|null findOneBy(array $criteria, array $orderBy = null)
 * @method AccueilMariage[]    findAll()
 * @method AccueilMariage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccueilMariageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AccueilMariage::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(AccueilMariage $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(AccueilMariage $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return AccueilMariage[] Returns an array of AccueilMariage objects
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
    public function findOneBySomeField($value): ?AccueilMariage
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
