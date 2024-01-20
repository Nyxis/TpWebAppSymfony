<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;



class UserController extends AbstractController
{
    #[Route('/admin/users', name: 'app_user_list', methods: ['GET'])]
    public function listUsers(
        EntityManagerInterface $em,
        Request $request,
        PaginatorInterface $paginatorInterface,
    ):Response {
        $data = $em->getRepository(User::class)->findAll();
        $users = $paginatorInterface->paginate(
            $data,
            $request->query->getInt('page',1),
        8 );

        return $this->render('admin/users/list.html.twig', [
            'users'=> $users
        ]);
    }

   #[Route('/admin/users/show/{id}', name: 'app_user_show', methods: ['GET'])]
    public function showUser(User $user
    ):Response {
        return $this->render('admin/users/show.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/admin/users/create', name: 'app_user_register')]
    public function createUser(
        UserPasswordHasherInterface $hasher,
        EntityManagerInterface $em,
        Request $request
    ): Response {
        $user = new User();
        $form = $this->createForm(UserFormType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if (!$form->isValid()) {
                $this->addFlash('error', 'Please fill in all the fields correctly.');
            }else{
            $roles = $form->get('roles')->getData();
            $user->setRoles($roles);

            $passwordHash = $hasher->hashPassword($user, $user->getPassword());
            $user->setPassword($passwordHash);

            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'The user was created successfully.');
        }
        }

        return $this->render('admin/users/register.html.twig', [
            'form' => $form->createView(),
            'errors' => $form->getErrors(true),
            'user' => $user,
        ]);
    }


    #[Route('/admin/users/{id}', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function editUser(
        $id,
        EntityManagerInterface $em,
        UserPasswordHasherInterface $hasher,
        Request $request
    ): Response
    {
        $user = $em->getRepository(User::class)->findOneBy(['id' => $id]);
        //$user = $userRepository->findOneBy(['id' => $id]);
        $form = $this->createForm(UserFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // dd($form->getData);
            $user = $form->getData();
            //dd($user);
            $passwordHasher = $hasher->hashPassword($user, $user->getPassword());

            $user->setPassword($passwordHasher);
            // dd($user);
            $em->persist($user);
            $em->flush();

            $this->addFlash(
                'success',
                'The new product has been edited successfully'
            );
            //return $this->redirectToRoute('app_user_list');
        }

        return $this->render('admin/users/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/admin/users/delete/{id} ', name: 'app_user_delete', methods: ['GET'])]
    public function deleteUser($id, EntityManagerInterface $em): Response
    {
        $user = $em->getRepository(User::class)->findOneBy(['id' => $id]);;

        $em->remove($user);
        $em->flush();

        $this->addFlash(
            'success',
            'The user has been deleted successfully'
        );

        if (!empty($user)) {
            $this->addFlash(
                "alert",
                'There aren\'t users, please create an user!'
            );
            return $this->redirectToRoute('app_user_register');
        }
        return $this->redirectToRoute('app_user_list');
    }


    #[Route('/admin/superAdmins ', name: 'app_user_superAdmin', methods: ['GET'])]
    public function displaySuperAdmins(UserRepository $userRepository){

        $users = $userRepository->findAllByRoles(['ROLE_SUPER_ADMIN']);

        return $this->render('admin/users/superAdmins.html.twig',[
            'users' => $users,
        ]);
    }

    #[Route('/admin/admins ', name: 'app_user_admin', methods: ['GET'])]
    public function displayAdmins(UserRepository $userRepository){
        $users = $userRepository->findAllByRoles(['ROLE_ADMIN']);

        return $this->render('admin/users/administrators.html.twig',[
            'users' => $users,
        ]);
    }

    #[Route('/admin/ordinaryUsers ', name: 'app_ordinary_user', methods: ['GET'])]
    public function displayOrdinaryUsers(UserRepository $userRepository){
        $users = $userRepository->findAllByRoles(['ROLE_USER']);

        return $this->render('admin/users/ordinaryUsers.html.twig',[
            'users' => $users,
        ]);
    }


}
