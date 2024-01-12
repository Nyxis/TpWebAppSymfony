<?php

namespace App\Controller;

use App\Form\LoginFormType;
use App\Security\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class LoginController extends AbstractController
{
    #[Route('/admin/login', name: 'app_login')]
    public function index(AuthenticationUtils $authenticationUtils, Request $request): Response
    {
        dump($authenticationUtils->getLastAuthenticationError());

        $form = $this->createForm(LoginFormType::class);

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                return $this->redirectToRoute('app_login_check');
            }

            return $this->render('login/register.html.twig', [
                'form' => $form->createView(),
            ]);
    }

    #[Route('/admin/loginCheck', name: 'app_login_check')]
    public function loginCheck():Response
    {
        return $this->render('login/login_check.html.twig');
    }

}
