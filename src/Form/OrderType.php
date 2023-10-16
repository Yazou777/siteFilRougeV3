<?php

namespace App\Form;

use App\Entity\Adresse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        //dd($options['user']);
        $user = $options['user'];
        $builder
            ->add('adr_rue', EntityType::class, [
                'class' => Adresse::class,
                'label' => 'Adresse de Livraison',
                'required' => true,
                'multiple' => false,
                'choices' => $user->getAdresses(),
                'expanded' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'user'=> []
        ]);
    }
}
