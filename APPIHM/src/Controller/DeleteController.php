<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\BonCommande;
class DeleteController extends AbstractController
{
    /**
     * @Route("/delete/", name="delete")
     */
    public function delete(Request $request): Response
    {
       
        $data = $request->get('bons');

        $repository = $this->getDoctrine()
                            ->getRepository(BonCommande::class);


        $em = $this->getDoctrine()->getManager();
        // get each information from AJAX POST request
        foreach($data as $bon){
            $bonToD = $repository->find($bon);
            $em->remove($bonToD);
        }
        //update entities and make redirection
        $em->flush();
        return $this->redirectToRoute('dashboard');
        
    }
}
