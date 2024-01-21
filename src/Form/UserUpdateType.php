<?php
// src/Form/UserType.php
namespace App\Form;

use App\Entity\Roles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class UserUpdateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options,): UserUpdateType
    {
        $builder
            ->add("firstname", TextType::class)
            ->add("lastname", TextType::class)
            ->add("password", PasswordType::class)
            ->add("email", EmailType::class)
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'User' => Roles::USER,
                    'Admin' => Roles::ADMIN,
                    'Super Admin' => Roles::SUPER_ADMIN,
                ],
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('update', SubmitType::class, ['label' => 'modifier l\'utilisateur']);

        return $this;
    }
}
