<?php

namespace App\Form;

use App\Entity\Roles;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;



class UserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('email', EmailType::class)
            ->add('password', PasswordType::class)
            ->add(
                'roles', ChoiceType::class, ['label' => 'roles',
                    'multiple' => true,
                    'choices' => ['Admin' => Roles::ADMIN,
                        'User' => Roles::USER,
                        'Super Admin' => Roles::SUPER_ADMIN],]
            );
    }

}