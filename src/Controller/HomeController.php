<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Mj;
use App\Entity\Dice;
use App\Entity\Deck;
use App\Entity\Coin;
use App\Entity\RollForCrit;


class HomeController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        $mj = New MJ("Mickael ");
        echo  "Le maitre du jeu est ".$mj->name();
      
     
        function random_caller(){
            $deck = new Deck();
            $dice = new Dice();
            $coin= new Coin(1,2);
            $critRate= new RollForCrit();
            $test = rand(1,4);
            switch($test){
            case 1: $critRate->crit();
            break;
            case 2:  echo $dice->randomDice();
            break;
            case 3: $deck->flip();
            break;
            case 4:  $result = rand($coin->pile(),$coin->face());
              if ($result== 1) {
                 echo "Vous lancez une pièce de monnaie, elle tombe sur pile";
            }
              if ($result == 2) {
                 echo "Vous lancez une pièce de monnaie, elle tombe sur face";
            }
            break;
            default: echo "could not run any function";
            break;
              }
              }
            
            random_caller();
     

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
  


}
