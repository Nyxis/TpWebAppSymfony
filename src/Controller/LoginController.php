<?php

namespace App\Controller;

use App\Security\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class LoginController extends AbstractController
{
    #[Route('/admin/login', name: 'app_login')]
    public function index(): Response
    {
        return $this->render('admin/login/login.html.twig');

    }

    #[Route('/admin/loginCheck', name: 'app_login_check', methods: ['POST'])]
    public function loginCheck():Response
    {

        return $this->render('admin/login/loginSuccess.html.twig');
    }

}
