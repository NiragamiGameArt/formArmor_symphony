<?php

namespace App\Repository;

use App\Entity\Plan_formation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Plan_formation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Plan_formation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Plan_formation[]    findAll()
 * @method Plan_formation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Plan_formationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Plan_formation::class);
    }

	public function listePlans() // Liste de tous les plans de formation avec pagination
	{
		$queryBuilder = $this->createQueryBuilder('p');

		// On n'ajoute pas de critère ou tri particulier ici car on veut tous les plans de formation, la construction
		// de notre requête est donc finie

		// On récupère la Query à partir du QueryBuilder
		$query = $queryBuilder->getQuery();

		// On gère ensuite la pagination grace au service KNPaginator
		return $query->getResult();
	}
	public function suppPlan($id) // Suppression du plan de formation d'identifiant $id
	{
		$qb = $this->createQueryBuilder('p');
		$query = $qb->delete('App\Entity\Plan_formation', 'p')
		  ->where('p.id = :id')
		  ->setParameter('id', $id);
		
		return $qb->getQuery()->getResult();
	}
	
    // /**
    //  * @return Plan_formation[] Returns an array of Plan_formation objects
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
    public function findOneBySomeField($value): ?Plan_formation
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
