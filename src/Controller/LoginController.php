<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\LoginFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class LoginController extends AbstractController
{
    #[Route('/login_check', name: 'app_login')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(LoginFormType::class);

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                return $this->redirectToRoute('home');
            }

            return $this->render('login/index.html.twig', [
                'form' => $form->createView(),
            ]);
        }
}
