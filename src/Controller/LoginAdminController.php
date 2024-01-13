<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FormFactoryinterface;


class LoginAdminController extends AbstractController
{
    #[Route('/login/admin', name: 'admin')]
    public function createUser(FormFactoryinterface $formfactory, Request $request): Response
    {
         
            $form = $formfactory
            ->createNamedBuilder{'user', FormTypeClass}
                ->add('name', TextType::class)
                
                ->getForm();
    
            // ...
        


        
        return $this->render('login_admin/index.html.twig', [
            'controller_name' => 'LoginAdminController',
        ]);
    }
}
