<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\BonCommande;
use Symfony\Component\Security\Core\Security;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
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
