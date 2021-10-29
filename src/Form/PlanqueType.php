<?php

namespace App\Form;

use App\Entity\Nationalite;
use App\Entity\Planque;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlanqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code')
            ->add('adresse')
            ->add('type')
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
            'data_class' => Planque::class,
        ]);
    }
}
