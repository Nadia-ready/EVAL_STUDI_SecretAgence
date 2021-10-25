<?php

namespace App\Form;

use App\Entity\Administrateur;
use App\Entity\Agent;
use App\Entity\Cible;
use App\Entity\Contact;
use App\Entity\Mission;
use App\Entity\Nationalite;
use App\Entity\Planque;
use App\Entity\Specialite;
use App\Entity\Statut;
use App\Entity\TypesMission;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MissionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('nom_code')
            ->add('date_debut')
            ->add('date_fin')

            ->add('agent', EntityType::class, [
                'class' => Agent::class,
                'choice_label' => 'nom'
            ])
            ->add('specialite', EntityType::class, [
                'class' => Specialite::class,
                'choice_label' => 'nom'
            ])
            ->add('statut', EntityType::class, [
                'class' => Statut::class,
                'choice_label' => 'nom'
            ])
            ->add('typesMission', EntityType::class, [
                'class' => TypesMission::class,
                'choice_label' => 'nom'
            ])
            ->add('planque', EntityType::class, [
                'class' => Planque::class,
                'choice_label' => 'code'
            ])
            ->add('contact', EntityType::class, [
                'class' => Contact::class,
                'choice_label' => 'nom'
            ])
            ->add('cible', EntityType::class, [
                'class' => Cible::class,
                'choice_label' => 'nom'
            ])
            ->add('nationalite', EntityType::class, [
                'class' => Nationalite::class,
                'choice_label' => 'pays'
            ])

            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Mission::class,
        ]);
    }
}
