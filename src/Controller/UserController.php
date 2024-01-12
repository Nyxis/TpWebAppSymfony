<?php

namespace App\Controller;

use App\Security\UserProvider;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\Choice;


class UserController extends AbstractController
{

    #[Route(path: '/admin/create')]
    public function createUser(Request $request, FormFactoryInterface $formFactory): Response
    {

        $form = $formFactory->createNamedBuilder('')
            ->setMethod("POST")
            ->setAction('/admin/create_check')
            ->add("firstname", TextType::class)
            ->add("lastname", TextType::class)
            ->add("password", PasswordType::class)
            ->add("email", EmailType::class)
            ->add("roles", TextType::class)
            ->add('create', SubmitType::class, ['label' => 'créer l\'utilsateur'])
            ->getForm();

        return $this->render('/admin/create.html.twig', ['form' => $form->createView()]);
    }


    #[Route(path: '/admin/create_check')]
    public function validateUser(Request $request): Response
    {

        $user = new User();

        $form = $this->createForm(FormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) $user = $form->getData();




        return $this->render('admin/create_ok.html.twig', []);

    }

}