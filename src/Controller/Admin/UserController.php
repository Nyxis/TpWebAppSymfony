<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/admin/user/create", name="admin_user_create")
     */
    public function create(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Vous pouvez ajouter ici une logique pour traiter le formulaire
            // ou simplement rediriger l'utilisateur vers la même page avec un message de succès.
            $this->addFlash('success', 'L\'utilisateur a été créé avec succès.');
            return $this->redirectToRoute('admin_user_create');
        }

        // If the form is not valid, add a flash message for failure
        $this->addFlash('error', 'Veuillez corriger les erreurs dans le formulaire.');

        return $this->render('user/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
