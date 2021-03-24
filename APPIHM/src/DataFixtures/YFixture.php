<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use App\Entity\Y;
use App\Entity\Service;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class YFixture extends Fixture
{
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder =$encoder;
    }
    public function load(ObjectManager $manager)
    {
        $user= new Y();
        $service=new Service();
        $service->setNomService("budget");
        $user->setEmail( 'moudholding@gmail.com');
        $user->setEmployes($service);
        $user->setNom('BARRY');
        $user->setPrenom('Mamoudou');
        $user->setIntitule('budget');
        $user->setColor("#ED3811");
        $user->setPassword ($this->encoder->encodePassword($user,'moud3011'));

        //user 1
        $user1= new Y();
        $service1=new Service();
        $service1->setNomService("comptabilite");
        $user1->setEmail( 'barrymoud@gmail.com');
        $user1->setEmployes($service1);
        $user1->setNom('BARRY');
        $user1->setPrenom('aliou');
        $user1->setIntitule('comptable');
        $user1->setColor("#E6ED11");
        $user1->setPassword ($this->encoder->encodePassword($user,'mamoudou'));
//user 2
        $user2= new Y();
        $service2=new Service();
        $service2->setNomService("management");
        $user2->setEmail( 'arsylla@gmail.com');
        $user2->setEmployes($service2);
        $user2->setNom('sylla');
        $user2->setPrenom('rahim');
        $user2->setIntitule('manager');
        $user2->setColor("#3F4885");
        $user2->setPassword ($this->encoder->encodePassword($user,'sylla'));
// user3

$user3= new Y();
$user3->setEmail( 'barrymoud3011@gmail.com');
$user3->setEmployes($service1);
$user3->setNom('BARRY');
$user3->setPrenom('moud');
$user3->setIntitule('comptable');
$user3->setColor("#BF13EA");
$user3->setPassword ($this->encoder->encodePassword($user,'barry'));
        // $product = new Product()
        $manager->persist($service);
        $manager->persist($service1);
        $manager->persist($service2);
        
        $manager->persist($user);
        $manager->persist($user1);
        $manager->persist($user2);
        $manager->persist($user3);


        $manager->flush();
    }
}
