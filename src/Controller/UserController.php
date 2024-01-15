<?php

namespace App\Controller;

//use App\Entity\Roles;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class UserController extends AbstractController
{
    public function listUsers(
        EntityManagerInterface $em
    )
    {
        $user = $em->getRepository('');
        return $this->render('admin/user/list.html.twig', [
            'user'=> $user
        ]);
    }
    #[Route('/admin/register', name: 'app_register')]
    public function createUser(
        EntityManagerInterface $em,
        Request $request
    ): Response
    {
        //dump($authenticationUtils->getLastAuthenticationError());

        $user = new User();

        $form = $this->createFormBuilder($user)
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('email', EmailType::class)
            ->add('password', PasswordType::class)
            ->add(
                'roles', ChoiceType::class, [
                    'label' => 'roles',
                    'multiple' => true,
                    'choices' => ['roles.admin' => 'ADMIN', 'roles.user' => 'USER', 'roles.super_admin' => 'SUPER_ADMIN'],

                ]
            )
            ->add('register', SubmitType::class, ['label' => 'Register'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                // Persist the user to the database
                //$user->setRoles($form->get('roles')->getData());
                var_dump($user);
                $em->persist($user);
                $em->flush();

                $this->addFlash('success', 'Le formulaire a été soumis avec succès.');
            } else {
                $this->addFlash('errors', "Le formulaire n'a pas été soumis avec succès.");
            }
        }


        return $this->render('admin/user/register.html.twig', [
            'form' => $form->createView(),
            'errors' => $form->getErrors(true),
            'user'=> $user
        ]);
    }


}
