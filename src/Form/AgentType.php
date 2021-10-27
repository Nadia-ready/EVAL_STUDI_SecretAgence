<?php

namespace App\Form;

use App\Entity\Agent;
use App\Entity\Nationalite;
use App\Entity\Specialite;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AgentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('date_naissance')
            ->add('code_identification')
            ->add('nationalite', EntityType::class, [
                'class' => Nationalite::class,
                'choice_label' => 'nationalite',
                'mapped' => false
            ])
            ->add('specialite', EntityType::class, [
                'class' => Specialite::class,
                'choice_label' => 'nom',
                'required' =>true,
                'mapped' => false

            ])
            //->add('agent')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Agent::class,
        ]);
    }
}
