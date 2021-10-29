<?php

namespace App\Form;

use App\Entity\Cible;
use App\Entity\Nationalite;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CibleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('date_naissance')
            ->add('nom_code')
            ->add('nationalite', EntityType::class, [
                'class' => Nationalite::class,
                'choice_label' => 'nationalite',
                'required' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cible::class,
        ]);
    }
}
