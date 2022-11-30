<?php
namespace App\Repository;

use App\Entity\Statut;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Statut|null find($id, $lockMode = null, $lockVersion = null)
 * @method Statut|null findOneBy(array $criteria, array $orderBy = null)
 * @method Statut[]    findAll()
 * @method Statut[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatutRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Statut::class);
    }
	public function listeStatuts()
	{
		$queryBuilder = $this->createQueryBuilder('s');

		// On n'ajoute pas de critère ou tri particulier ici car on veut tous les statuts, la construction
		// de notre requête est donc finie
		
		// On récupère la Query à partir du QueryBuilder
		$query = $queryBuilder->getQuery();

		return $query->getResult();
	}
	public function suppStatut($id) // Suppression du statut d'identifiant $id
	{
		$qb = $this->createQueryBuilder('s');
		$query = $qb->delete('App\Entity\Statut', 's')
		  ->where('s.id = :id')
		  ->setParameter('id', $id);
		
		return $qb->getQuery()->getResult();
	}
	
    // /**
    //  * @return Statut[] Returns an array of Statut objects
    //  */
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
    public function findOneBySomeField($value): ?Statut
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
