<?php
namespace App\Controller;

use App\Entity\User;
use App\Form\UserUpdateType;
use App\Repository\UserDoctrineRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
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

        if (!$request->isMethod('DELETE') && !$request->isMethod('PUT'))
            $message = "créez, éditez ou supprimez des utilisateurs";

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

    #[Route ('/admin/user/delete/{id}')]
    public function deleteUser(int $id, UserDoctrineRepository $userDoctrineRepository, EntityManagerInterface $entityManager)
    {
        $user = $entityManager->getRepository(User::class)->find($id);
        $entityManager->remove($user);
        $entityManager->flush();

        $message = "utilisateur supprimé";
        $usersList = $userDoctrineRepository->findAll();
        if (count($usersList) < 1) {
            return $this->render('admin/nouser.html.twig');
        }
        return $this->render('admin/users.html.twig', [
            'message' => $message,
            'userslist' => $usersList
        ]);
    }

    #[Route ('/admin/user/update/{id}')]
    public function updateUser(Request $request, int $id, UserDoctrineRepository $userDoctrineRepository, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager)
    {
        $user = $entityManager->getRepository(User::class)->find($id);
        $form = $this->createForm(UserUpdateType::class, $user,);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $hashedPass = $userPasswordHasher->hashPassword($user, $user->getPassword());
            $user->setPassword($hashedPass);
            $entityManager->flush();
            $usersList = $userDoctrineRepository->findAll();
            $message = "utilisateur mis à jour avec succès";
            return $this->render('/admin/users.html.twig', [
                'userslist' => $usersList, 'message' => $message
            ]);
        }
        return $this->render('admin/update.html.twig', ['form' => $form->createView()]);
    }
}