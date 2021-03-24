<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
        
        $bonCommandes = $repository->findAll();
            
        return $this->render('dashboard/dash.html.twig', [
            'bonCommandes' => $bonCommandes,

        ]);
    }
}
