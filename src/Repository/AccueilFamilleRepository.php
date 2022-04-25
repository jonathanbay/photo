<?php

namespace App\Repository;

use App\Entity\AccueilFamille;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AccueilFamille>
 *
 * @method AccueilFamille|null find($id, $lockMode = null, $lockVersion = null)
 * @method AccueilFamille|null findOneBy(array $criteria, array $orderBy = null)
 * @method AccueilFamille[]    findAll()
 * @method AccueilFamille[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccueilFamilleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AccueilFamille::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(AccueilFamille $entity, bool $flush = true): void
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
    public function remove(AccueilFamille $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return AccueilFamille[] Returns an array of AccueilFamille objects
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
    public function findOneBySomeField($value): ?AccueilFamille
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
