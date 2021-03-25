<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\BonCommande;
use Symfony\Component\Security\Core\Security;

class BudgetController extends AbstractController
{
     /**
     * @Route("/budget", name="budget")
     */
    public function index(Security $security): Response
    {
        $repository = $this->getDoctrine()
                            ->getRepository(BonCommande::class);
        // fetching all from database
        
        $bonCommandes = $repository->findBy(['validBudget'=>True]); 
      


            
        return $this->render('budget/index.html.twig', [
            'bonCommandes' => $bonCommandes,

        ]);
    }
}
