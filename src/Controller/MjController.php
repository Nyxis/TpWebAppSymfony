<?php

namespace App\Controller;

use App\Entity\Coin;
use App\Entity\Deck;
use App\Entity\Dice;
use App\Entity\Mj;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MjController extends AbstractController
{
#[Route('/mj', name: 'app_mj')]
public function tirageAuSort($critRate): Response
{
    $nombreDeFacesPossible = [
        [1,2,3,4,5,6],
        [1,2,3,4,5,6,7,8,9],
        [1,2,3,4,5,6,7,8,9,10,11,12]
    ];
        $faces = [$nombreDeFacesPossible[rand(0,2)]];

    $dice = new Dice ($faces);
    $coin = new Coin(4);
    $deck = new Deck();

    $master = new Mj($deck, $dice, $coin);


/*  *********************************************************************
   ==> créer une interface pour définir une methode de tirage aléatoire
    puis l'appeler depuis le controller <==
  ***********************************************************************/


    return $this->render('mj/index.html.twig', [
        'controller_name' => 'MjController',
    ]);
}

}