<?php

namespace App\Controller;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class UserListController extends AbstractController
{
    #[Route('/user/list', name: 'app_user_list')]
    public function index(UserRepository $UserRepository): Response
    {
        $user = $UserRepository->findAll();
        return $this->render('user_list/index.html.twig', [
            'users' => $user,
        ]);
    }
}
