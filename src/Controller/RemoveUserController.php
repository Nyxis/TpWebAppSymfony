<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use App\Repository\UserRepository;
use App\Entity\User;
class RemoveUserController extends AbstractController
{
    #[Route('/remove/user/{id}', name: 'app_remove_user')]


    public function removeUser(int $id, UserRepository $userRepository, EntityManagerInterface $em)
    {
       
        $user = $em->getRepository(User::Class)->find($id);
        $em->remove($user);
        $em->flush();
        return $this->redirectToRoute('app_user_list');



        return $this->render('remove_user/index.html.twig', [
            'controller_name' => 'RemoveUserController',
        ]);
    }
}
