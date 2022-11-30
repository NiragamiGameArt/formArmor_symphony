<?php
namespace App\Repository;

use App\Entity\Formation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Formation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Formation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Formation[]    findAll()
 * @method Formation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Formation::class);
    }
	public function listeFormations()
	{
		// En passant par le raccourci (c'est préférable)
		$queryBuilder = $this->createQueryBuilder('f');

		// On n'ajoute pas de critère ou tri particulier ici car on veut toutes les formations, la construction
		// de notre requête est donc finie

		// On récupère la Query à partir du QueryBuilder
		$query = $queryBuilder->getQuery();

		// On gère ensuite la pagination grace au service KNPaginator
		
		return $query->getResult();
	}
	public function suppFormation($id) // Suppression de la formation d'identifiant $id
	{
		$qb = $this->createQueryBuilder('f');
		$query = $qb->delete('App\Entity\Formation', 'f')
		  ->where('f.id = :id')
		  ->setParameter('id', $id);
		
		return $qb->getQuery()->getResult();
	}
	
	
    // /**
    //  * @return Formation[] Returns an array of Formation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Formation
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
