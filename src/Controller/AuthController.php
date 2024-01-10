<?php
namespace App\Controller;



use App\Entity\LoggerClass;

use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Security\Http;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class AuthController extends AbstractController
{
    #[Route(path: '/auth/login')]

    public function login(Request $request): Response
    {

        $loggerObj = new LoggerClass();

        $form = $this->createFormBuilder($loggerObj)
            ->add('username', TextType::class)
            ->add('password', PasswordType::class)
            ->add('login', SubmitType::class, ['label' => 'se connecter'])
            ->getForm();

        return $this->render('/auth/login.html.twig', ['form' =>$form->createView()]);

    }
}