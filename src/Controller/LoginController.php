<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(Request $request): Response
    {
        $formulaire = '<form action="login_check" method="post">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" style="margin-bottom: 20px;"> <br>
                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" id="password"> <br>
                            <button type="submit">Envoyer</button>
                        </form>'; 

        return new Response($formulaire);
    }
    
    #[Route('/login_check', name: 'app_login_check', methods: ['POST'])]
    public function loginCheck(Request $request): Response
    {
        $email = $request->request->get('email');
        $password = $request->request->get('password');

        return new Response('Vous êtes connecté!!! ');
    }
}
