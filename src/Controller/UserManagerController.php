<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserDoctrineRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class UserManagerController extends AbstractController
{

    #[Route ('/admin/users')]
    public function showUsers(Request $request, UserDoctrineRepository $userDoctrineRepository): Response
    {
        $usersList = $userDoctrineRepository->findAll();
        if (count($usersList) < 1) {

            return $this->render('admin/nouser.html.twig');
        }

        $deleteUser = '/admin/delete/{{user.id}}';

        if ($request->isMethod($deleteUser)) {
            $message = "utilisateur supprimé";
        } else $message = "éditez ou supprimez des utilsateurs";

        return $this->render('admin/users.html.twig', [
            'userslist' => $usersList,
            'message' => $message
        ]);

    }

    #[Route ('/admin/nouser')]
    public function nothingToShow(Request $request,): Response
    {

        return $this->render('admin/nouser.html.twig');
    }


    #[Route ('/admin/user/{id}/delete')]
    public function deleteUser(int $id, UserDoctrineRepository $userDoctrineRepository, EntityManagerInterface $entityManager)
    {
        $user = $entityManager->getRepository(User::class)->find($id);
        $entityManager->remove($user);
        $entityManager->flush();

        $message = "utilisateur supprimé";
        $usersList = $userDoctrineRepository->findAll();

        return $this->render('admin/users.html.twig', [

            'message' => $message,
            'userslist' => $usersList
        ]);

    }

}