<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\BonCommande;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Y;

class ValidateController extends AbstractController
{
    /**
     * @Route("/validate", name="validate")
     */
    public function index(AuthenticationUtils $authenticationUtils,Request $request): Response
    { 
        $data = $request->get('bons');


       $entityManager = $this->getDoctrine()->getManager();
        //echo($this->getUser()->getId());
        $valideursAJour=[];
        foreach($data as $bon){
            $bonToValidate  = $entityManager->getRepository(BonCommande::class)->find($bon);

            $valideurs=$bonToValidate ->getListeValideurs();
            
            
            if (is_null($valideurs)){
                
                //$valideursAJour[]=$this->getUser();
                array_push($valideursAJour,$this->getUser()->getId());
                $bonToValidate->setListeValideurs( $valideursAJour);
                $bonToValidate->setValidePar($this->getUser());
             
        
               

            } else{

                //$valideurs[]=$this->getUser();
                array_push($valideurs,$this->getUser()->getId());
                $bonToValidate->setValidePar($this->getUser());
                $bonToValidate->setListeValideurs($valideurs);
        
            }
        

         //  $entityManager->remove($bonToD);
        }

        $entityManager1 = $this->getDoctrine()->getManager();
        $user  = $entityManager1->getRepository(Y::class)->find($this->getUser());
        $count=$user->getNbCommandesValidees();
        $user->setNbCommandesValidees($count+1);
        
        if($user->getIntitule()=="budget"){
            $bonToValidate->setValidBudget(true);
        } elseif($user->getIntitule()=="comptable"){
            $bonToValidate->setValidComptabilite(true);
        } else {
            $bonToValidate->setValidManagement(true);
        }
            if ($bonToValidate->getValidManagement()==TRUE && $bonToValidate->getValidComptabilite()==TRUE &&
            $bonToValidate->getValidBudget()==TRUE){
                //$bonToValidate->setDateValidation(new \DateTime());
                $bonToValidate->setStatut("Valide");
            }
        
        $entityManager ->flush();
        $entityManager1 ->flush();

        return $this->redirectToRoute('dashboard');
        
    }
}
