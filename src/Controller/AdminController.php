<?php

namespace App\Controller;
use App\Entity\User;
use App\Form\Type\UserType;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]

    public function new(Request $request): Response
    {
        echo "Bienvenue ".$this->getUser()->getUserIdentifier()."!!!!!!!!!";
        // just set up a fresh $task object (remove the example data)
        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $user = $form->getData();

            // ... perform some action, such as saving the task to the database

            return $this->redirectToRoute('app_create_user_success');
        }



        return $this->render('admin/index.html.twig', [
            'form' => $form,
        ]);
    }
}
