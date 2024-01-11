<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AuthController extends AbstractController
{
    #[Route(path: '/auth/login')]
    public function login(FormFactoryInterface $formFactory, Request $request): Response
    {
//        dump($authenticationUtils->getLastAuthenticationError());

        $form = $formFactory->createNamedBuilder('')
            ->setMethod('POST')
            ->setAction('/auth/login_check')
            ->add('_username', EmailType::class)
            ->add('_password', PasswordType::class)
            ->add('login', SubmitType::class, ['label' => 'se connecter'])
            ->getForm();

        return $this->render('/auth/login.html.twig', ['form' => $form->createView()]);
    }

    #[Route(path: '/auth/login_check')]
    public function loginCheck(Request $request): Response
    {
        printf("in the Checkcontroller");
        if ($request->isMethod('POST')) return $this->render('/auth/success.html.twig', []);
        else return $this->render('/auth/login.html.twig', []);

    }

    #[Route(path: '/auth/success')]
    public function success(Request $request): Response
    {
        $wellDone = "tu es connecté";

        return $this->render('/auth/success.html.twig', [
            'welldone' => $wellDone
        ]);

    }
}