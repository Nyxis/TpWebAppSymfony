<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginCheckController extends AbstractController
{
    #[Route('admin/login/check', name: 'app_login_check')]
    public function index(): Response
    {
      
        return $this->render('login_check/index.html.twig', [
            'controller_name' => 'LoginCheckController',
        ]);
    }
}
