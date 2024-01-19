<?php
namespace App\Controller;


use App\Form\LoginFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(AuthenticationUtils $authenticationUtils, Request $request): Response
    {
        //dump($authenticationUtils->getLastAuthenticationError());

        //$this->denyAccessUnlessGranted('ROLE_ADMIN');

        // or add an optional message - seen by developers
        //$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        return $this->render('admin/login/loginSuccess.html.twig');
    }
}
