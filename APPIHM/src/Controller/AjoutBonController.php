<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\BonCommande;
use App\Form\BonCommandeType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
class AjoutBonController extends AbstractController
{
    /**
     * @Route("/ajoutBon", name="ajout_bon")
     */
    public function index(Request $request): Response
    {
        $bonCommande = new BonCommande();
        $manager = $this->getDoctrine()->getManager();
        //creating form to handle request
        $form = $this->createForm(BonCommandeType::class, $bonCommande);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            //$task = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $bonCommande->setNumCommande($form["numCommande"]->getData());
            $bonCommande->setFournisseur($form["fournisseur"]->getData());
            $bonCommande->setTypeDocument($form["typeDocument"]->getData());
            $bonCommande->setNomClient($form["nomClient"]->getData());
            $bonCommande->setDateCommande($form["dateCommande"]->getData());
            $bonCommande->setMontant($form["montant"]->getData());
            $bonCommande->setStatut("En attente");


            //$manager = $this->getDoctrine()->getManager();
            $manager->persist($bonCommande);
            $manager->flush();
            //make redirection to dashboard
            return $this->redirectToRoute('dashboard');
        }

        return $this->render('ajout_bon/ajoutBon.html.twig', [
            'form' => $form->createView(),
        ]);
        
    }
}
