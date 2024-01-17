<?php

// src/Form/UserType.php

namespace App\Form;

use App\Entity\Roles;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options,): UserType
    {
        $builder
            ->add("firstname", TextType::class)
            ->add("lastname", TextType::class)
            ->add("password", PasswordType::class)
            ->add("email", EmailType::class)
            ->add('roles', EnumType::class, [
                'class' => Roles::class, 'multiple' => true])
            ->add('create', SubmitType::class, ['label' => 'Créer l\'utilisateur']);

        return $this;
    }

}
