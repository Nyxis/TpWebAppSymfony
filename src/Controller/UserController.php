<?php

namespace App\Controller;

use App\Security\UserProvider;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\BaseType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\Choice;
use function Symfony\Component\String\u;


class UserController extends AbstractController
{

    #[Route(path: '/admin/create')]
    public function createUser(Request $request): Response
    {
$user = new User();
        $form = $this->createFormBuilder($user)
            ->setMethod("POST")
            ->setAction('/admin/create_check')
            ->add("firstname", TextType::class)
            ->add("lastname", TextType::class)
            ->add("password", PasswordType::class)
            ->add("email", EmailType::class)
            ->add('roles', ChoiceType::class, [
                'choices' => ['ROLE_ADMIN' => 'ROLE_ADMIN', 'ROLE_USER' => 'ROLE_USER'],
                'multiple' => true,
            ])
            ->add('create', SubmitType::class, ['label' => 'créer l\'utilsateur'])
            ->getForm();

        return $this->render('/admin/create.html.twig', ['form' => $form->createView()]);
    }


    #[Route(path: '/admin/create_check')]
    public function validateUser(Request $request): Response
    {

        $user = new User();

        $form = $this->createForm(FormType::class, $user, ['allow_extra_fields'=>true]);
        $form->handleRequest($request);
        $user = $form->getData();
        dump($user);
        if ($form->isSubmitted() && $form->isValid()){


            $message = "formulaire correctement pris en compte";

        }
        else $message = "un incident s'est produit lors de la validation du formulaire";




        return $this->render('admin/create_ok_or_nok.html.twig', ["message"=>$message]);

    }

}