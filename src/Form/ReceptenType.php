<?php

namespace App\Form;

use App\Entity\Medicijnen;
use App\Entity\Patienten;
use App\Entity\Recepten;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReceptenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('datum',DateType::class,[
                'widget'=>'single_text'])
            ->add('periode')
            ->add('medicijnen',EntityType::class,[
                'class'=>Medicijnen::class,
                'choice_label'=>'Naam',
            ])
            ->add('patienten',EntityType::class,[
                'class'=>Patienten::class,
                'choice_label'=>'naam',

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recepten::class,
        ]);
    }
}
