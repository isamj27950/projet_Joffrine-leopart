<?php

namespace App\Repository;

use App\Entity\OeuvreArtistique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OeuvreArtistique>
 *
 * @method OeuvreArtistique|null find($id, $lockMode = null, $lockVersion = null)
 * @method OeuvreArtistique|null findOneBy(array $criteria, array $orderBy = null)
 * @method OeuvreArtistique[]    findAll()
 * @method OeuvreArtistique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OeuvreArtistiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OeuvreArtistique::class);
    }

    public function save(OeuvreArtistique $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(OeuvreArtistique $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return OeuvreArtistique[] Returns an array of OeuvreArtistique objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?OeuvreArtistique
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
