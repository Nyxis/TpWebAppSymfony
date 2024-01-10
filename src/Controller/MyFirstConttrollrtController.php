<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MyFirstConttrollrtController extends AbstractController
{
    #[Route('/my/first/conttrollrt', name: 'app_my_first_conttrollrt')]
    public function index(): Response
    {
        return $this->render('my_first_conttrollrt/index.html.twig', [
            'controller_name' => 'MyFirstConttrollrtController',
        ]);
    }
}
