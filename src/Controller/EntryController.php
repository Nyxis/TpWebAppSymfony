<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class EntryController extends AbstractController
{
    #[Route(path: '/auth/login')]
    public function login(Request $request): Response
    {
//        dump($authenticationUtils->getLastAuthenticationError());

        $go = "GO";


        return $this->render('/auth/login.html.twig', ['go' => $go]);
    }

//    #[Route(path: '/auth/login_check')]
//    public function loginCheck(Request $request): Response
//    {
//        printf("in the Checkcontroller");
//        if ($request->isMethod('POST')) return $this->render('/auth/success.html.twig', []);
//        else return $this->render('/auth/login.html.twig', []);
//
//    }

    #[Route(path: '/auth/success')]
    public function success(Request $request): Response
    {
        $wellDone = "welcome to Symfony";
        $loginUrlRef = '/admin/login';

        return $this->render('/auth/success.html.twig', [
            'welldone' => $wellDone, "loginUrlRef"=>$loginUrlRef
        ]);

    }

    /*ADMIN PART*/


    #[Route(path: '/admin/login')]
    public function loginAdmin(FormFactoryInterface $formFactory, Request $request, AuthenticationUtils $authenticationUtils): Response
    {
     dump($authenticationUtils->getLastAuthenticationError());

        $form = $formFactory->createNamedBuilder('')
            ->setMethod('POST')
            ->setAction('/admin/login_check')
            ->add('_username', EmailType::class)
            ->add('_password', PasswordType::class)
            ->add('login', SubmitType::class, ['label' => 'se connecter'])
            ->getForm();

        return $this->render('/admin/login.html.twig', ['form' => $form->createView()]);
    }

    #[Route(path: '/admin/login_check')]
    public function loginAdminCheck(Request $request): Response
    {
        return $this->render('/admin/success.html.twig', []);
    }

    #[Route(path: '/admin/success')]
    public function successAdmin(Request $request): Response
    {
       $userName = $this->getUser()->getUserIdentifier();
       $formUrlRef = '/admin/create';

        return $this->render('/admin/success.html.twig', ["username" => $userName,"formurlref" => $formUrlRef]);

    }
}