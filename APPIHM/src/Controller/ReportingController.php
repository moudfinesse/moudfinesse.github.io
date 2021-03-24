<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Y;

class ReportingController extends AbstractController
{
    /**
     * @Route("/reporting", name="reporting")
     */
    public function reports(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
       // chercher tous les utilisateurs
       $users=$entityManager->getRepository(Y::class)->findAll();
       $userNom=[];
       $userColor=[];
       $NbCo=[];

       foreach($users as $user){
            $userNom[]=$user->getNom()."  ".$user->getPrenom();
            //information to represent user on the reports
            $userColor[]=$user->getColor();
            $userNbCo[]=$user->getNbCommandesValidees();
       }



        return $this->render('reporting/reporting.html.twig',[

            'userNom'=>json_encode($userNom),
            'userColor'=>json_encode($userColor),
            'userNbCo' => json_encode($userNbCo)

        ]);
    }
}
