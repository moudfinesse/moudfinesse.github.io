<?php

namespace App\DataFixtures;
use App\Entity\BonCommande;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BonCommandeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
         $bonCommande = new BonCommande();
         $date="01-02-2021";
         $bonCommande->setNumCommande(5800);
         $bonCommande->setFournisseur('OGDH');
         $bonCommande->setNomClient('alasko');
         $bonCommande->setDateCommande(\DateTime::createFromFormat('d-m-Y',$date));
         $bonCommande->setMontant(200,88);
         $bonCommande->setStatut('En attente');

         //bon 2
         $bonCommande1 = new BonCommande();
         $date1="10-02-2021";
         $bonCommande1->setNumCommande(1200);
         $bonCommande1->setFournisseur('Cdiscount');
         $bonCommande1->setNomClient('Presidence GN');
         $bonCommande1->setDateCommande(\DateTime::createFromFormat('d-m-Y',$date1));
         $bonCommande1->setMontant(15000);
         $bonCommande1->setStatut('En attente');
        $manager->persist($bonCommande);
        $manager->persist($bonCommande1);

        $manager->flush();
    }
}
