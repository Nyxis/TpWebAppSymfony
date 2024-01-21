<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;
use App\Form\Type\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use App\Repository\UserRepository;

class UpdateUserController extends AbstractController
{
    #[Route('/update/user/{id}', name: 'app_update_user')]
    public function new(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $hasher, int $id ): Response
    {
     
       
        $user = $em->getRepository(User::class)->findOneBy(['id' => $id]);
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
   
       
        if ($form->isSubmitted() && $form->isValid()) {

            
            $passwordHasher = $hasher->hashPassword($user, $user->getPassword());
            $user->setPassword($passwordHasher);
            $user = $form->getData();

            $user = $em->getRepository(User::Class)->find($id);
            $em->persist($user);
            $em->flush();
          

            return $this->redirectToRoute('app_user_list');
        }
      
        return $this->render('update_user/index.html.twig', [
            'form' => $form,
        ]);
    }
}
