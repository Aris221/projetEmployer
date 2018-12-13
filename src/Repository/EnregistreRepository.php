<?php

namespace App\Repository;

use App\Entity\Enregistre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Enregistre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Enregistre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Enregistre[]    findAll()
 * @method Enregistre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnregistreRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Enregistre::class);
    }

//    /**
//     * @return Enregistre[] Returns an array of Enregistre objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Enregistre
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
