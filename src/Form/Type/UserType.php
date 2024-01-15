<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('password', PasswordType::class)
            ->add('email', EmailType::class)
            ->add('roles', ChoiceType::class,[
                'choices'=>[
                    'ROLE_USER' => 'user',
                    'ROLE_ADMIN' => 'admin',
                    'ROLE_SUPER_ADMIN' => 'super_admin'
                ]
            ])

            ->add('submit', SubmitType::class)
        ;
        
    }
    
}0
?>