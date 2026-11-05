<?php

namespace App\Form;

use App\Entity\Artiste;
use App\Entity\Lieu;
use App\Entity\Oeuvre;
use App\Entity\Technique;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OeuvreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('dateCreation', null, ['label' => 'Date de Création'])
            ->add('dateDestruction', null, ['label' => 'Date de Destruction'])
            ->add('artistes', EntityType::class, [
                'class' => Artiste::class,
                'choice_label' => 'pseudonyme',
                'multiple' => true,
                'by_reference' => false,
                'attr' => ['class' => 'form-select', 'size' => 2, 'style' => 'max-width: 300px;',],
                'required' => false,
            ])
            ->add('lieu', EntityType::class, [
                'class' => Lieu::class,
                'choice_label' => 'nom',
            ])
            ->add('technique', EntityType::class, [
                'class' => Technique::class,
                'choice_label' => 'nom',
            ])
            ->add('oeuvre', EntityType::class, [
                'class' => Oeuvre::class,
                'choice_label' => 'titre',
                'label' => 'Œuvre Recouverte',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Oeuvre::class,
        ]);
    }
}
