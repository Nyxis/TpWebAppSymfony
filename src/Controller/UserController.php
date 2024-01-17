<?php

namespace App\Controller;


use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;




class UserController extends AbstractController
{

    #[Route(path: '/admin/create')]
    public function createUser(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user, );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message = "Formulaire correctement pris en compte";
            $hashedPass = $userPasswordHasher->hashPassword($user, $user->getPassword());
            $user->setPassword($hashedPass);
            $em->persist($user);
            $em->flush();
            return $this->render('admin/create_ok.html.twig', ['message' => $message]);

        } elseif ($form->isSubmitted() && !$form->isValid()) {
            $this->redirectToRoute('/admin/create_nok');
        }

        return $this->render('/admin/create.html.twig', ['form' => $form->createView()]);

    }


    #[Route(path: '/admin/create_ok')]
    public function creationOK(Request $request,): Response
    {
        return $this->render('admin/users.twig');
    }

    #[Route(path: '/admin/create_nok')]
    public function creationNOK(Request $request,): Response
    {
        $message = "un incident est survenu lors de la soumission du formulaire";
        $formUrlRef = '/admin/create';

        return $this->render('/admin/create_nok.html.twig', ['formUrlRef' => $formUrlRef, 'message' => $message]);
    }

}
