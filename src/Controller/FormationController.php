<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\Persistence\ManagerRegistry;

// Nécessaire pour la pagination
use Symfony\Component\HttpFoundation\Request; // Nous avons besoin d'accéder à la requête pour obtenir le numéro de page
use Knp\Component\Pager\PaginatorInterface; // Nous appelons le bundle KNP Paginator

use App\Entity\Formation;

class FormationController extends AbstractController
{
    /**
     * @Route("/formation", name="formation")
     */
    public function liste(Request $request, PaginatorInterface $paginator, ManagerRegistry $doctrine)
    {
      $this->doctrine=$doctrine;
		  $rep = $doctrine->getRepository(Formation::class);
		  $lesFormations = $rep->findAll();
		
      $lesFormationsPagines = $paginator->paginate(
              $lesFormations, // Requête contenant les données à paginer (ici nos formations)
              $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
              4 // Nombre de résultats par page
          );
		
		  return $this->render('formation/index.html.twig', Array('lesFormations' => $lesFormationsPagines));
    }
}
