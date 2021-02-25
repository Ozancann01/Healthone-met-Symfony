<?php

namespace App\Form;

use App\Entity\Medicijnen;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MedicijenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Naam')
            ->add('werking')
            ->add('Bijwerkingen')
            ->add('Prijs')
            ->add('Verzekerd')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Medicijnen::class,
        ]);
    }
}
