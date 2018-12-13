<?php

namespace App\Repository;

use App\Entity\TypeHeure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeHeure|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeHeure|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeHeure[]    findAll()
 * @method TypeHeure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeHeureRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeHeure::class);
    }

//    /**
//     * @return TypeHeure[] Returns an array of TypeHeure objects
//     */
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
    public function findOneBySomeField($value): ?TypeHeure
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
