<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\Type\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CreateUserController extends AbstractController
{
    #[Route('admin/create/user', name: 'app_create_user')]
    public function new(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $hasher): Response
    {
        $user = new User();
   
   
        
        
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
   
       
        if ($form->isSubmitted() && $form->isValid()) {

            
            $passwordHasher = $hasher->hashPassword($user, $user->getPassword());
            $user->setPassword($passwordHasher);
            $user = $form->getData();

            $em->persist($user);
            $em->flush();
          

            return $this->redirectToRoute('app_create_user_success');
        }
    


        return $this->render('create_user/index.html.twig', [
            'form' => $form,
        ]);
    }


#[Route('/update/user/{id}', name: 'app_update_user', methods: ['GET'])]
public function editUser($id, EntityManagerInterface $em, UserRepository $userRepository): Response
{
    $user = $userRepository->find($id);

   

    return $this->render('Update/e.html.twig', [
        'users' => $user,
    ]);
}

}

