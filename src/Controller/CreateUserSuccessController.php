<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateUserSuccessController extends AbstractController
{
    #[Route('admin/create/user/success', name: 'app_create_user_success')]
    public function index(): Response
    {
        return $this->render('create_user_success/index.html.twig', [
            'controller_name' => 'CreateUserSuccessController',
        ]);
    }
}
