<?php

namespace App\Form;

use App\Entity\Artiste;
use App\Entity\Oeuvre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArtisteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pseudonyme')
            ->add('nomReel')
            ->add('bio')
            ->add('nationalite')
            ->add('oeuvre', EntityType::class, [
                'class' => Oeuvre::class,
                'choice_label' => 'titre',
                'multiple' => true,
                'by_reference' => false,
                'attr' => ['class' => 'form-select', 'size' => 1, 'style' => 'max-width: 300px;',],
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Artiste::class,
        ]);
    }
}
