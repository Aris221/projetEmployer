<?php

namespace App\Repository;

use App\Entity\StuationMatrimoniale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method StuationMatrimoniale|null find($id, $lockMode = null, $lockVersion = null)
 * @method StuationMatrimoniale|null findOneBy(array $criteria, array $orderBy = null)
 * @method StuationMatrimoniale[]    findAll()
 * @method StuationMatrimoniale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StuationMatrimonialeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StuationMatrimoniale::class);
    }

//    /**
//     * @return StuationMatrimoniale[] Returns an array of StuationMatrimoniale objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StuationMatrimoniale
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
