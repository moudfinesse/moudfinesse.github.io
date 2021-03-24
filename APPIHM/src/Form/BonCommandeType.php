<?php

namespace App\Form;

use App\Entity\BonCommande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
class BonCommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numCommande',TextType::class)
            ->add('fournisseur',TextType::class)
            ->add('typeDocument',TextType::class)
            ->add('nomClient',TextType::class)
            ->add('dateCommande',DateType::class)
            ->add('montant')
            ->add('Enregister', SubmitType::class, [
                'attr' => ['class' => 'save btn btn-primary'],
            ]);
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BonCommande::class,
        ]);
    }
}
