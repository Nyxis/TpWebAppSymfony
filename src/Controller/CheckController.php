<?php

namespace App\Controller;

use App\Entity\LoggerClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckController extends AbstractController
{
#[Route(path: '/auth/login_check')]

public function loginCheck(Request $request): Response
{
$loggerObj = new LoggerClass();

    $form = $this->createForm(Form::class, $loggerObj);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {

        $form->getData();

       return $this->redirectToRoute('success');
    }


    return $this->render('/auth/login_check.html.twig', [
        'form' => $form,
    ]);

}

}