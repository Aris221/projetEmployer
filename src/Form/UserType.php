<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('nationalite')
            ->add('username')
            ->add('password', RepeatedType::class,array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Mot de passe'),
                'second_options' => array('label' => 'Confirmation'),
            ))
            ->add('telephone')
            ->add('compte', EntityType::class,[
                'class'=>'App\Entity\Compte',
                'choice_label' =>'nonCompte',
                'expanded' => false,
                'multiple' => false

        ])
          /*  ->add('compte',EntityType::class, [
                'class' => 'App\Entity\Compte',
                'choice_label' => 'nonCompte',
                'expanded' => true,
                'multiple' => true
            ] )*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
