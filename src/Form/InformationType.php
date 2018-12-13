<?php

namespace App\Form;

use App\Entity\Employe;
use App\Entity\Information;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\LanguageType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InformationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adresse')
            ->add('age')
           // ->add('employer', EntityType::class,[
          //      'class' => Employe::class,
          //      'choice_label' => 'id'
          //  ])
            ->add('langue', EntityType::class,[
                'class'=>'App\Entity\Langue',
                'expanded' => true,
                'multiple' => true,
                'label' =>'Langue'

            ])
            ->add('Sm', EntityType::class,[
                'class'=>'App\Entity\StuationMatrimoniale',
                'expanded' => true,
                'multiple' => false,
                'label' => 'Situation matrimoniale'

            ])
            ->add('travaille' , EntityType::class,[
                'class'=>'App\Entity\Travaille',
                'choice_label' =>'nonTravaille',
                'expanded' => true,
                'multiple' => true

            ])
            ->add('typeHeure')
            ->add('ceremonie', EntityType::class,[
                'class'=>'App\Entity\Ceremonie',
                'choice_label' =>'nomCeremonie',
                'expanded' => true,
                'multiple' => true

            ])
            ->add('niveauEtude')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Information::class,
        ]);
    }
}
