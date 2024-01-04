<?php

namespace App\Controller;


use App\Entity\Coin;
use App\Entity\Deck;
use App\Entity\Dice;
use App\Entity\Mj;
use App\Service\RollInterface;
use App\Service\TirageAdapter;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;



class MjController extends AbstractController
{
    #[Route(path: '/mj/roll')]


    public function main():Response
    {

$sortie = $this->rollForCrit();


return $this->render('mj/roll.html.twig', ['sortie' => $sortie]);

}
    public function rollForCrit():string
    {

        $critRate = rand(1, 100);
        $deck = new Deck();
        $dice = new Dice();
        $coin = new Coin();

        $masterMaster = new Mj($deck, $dice, $coin);


        $roulette = rand(1, 3);

        switch ($roulette) {
            case 1:
                $result = $masterMaster->getName() . "tire une carte et obient le score de " . $masterMaster->deckTirage();
                break;
            case 2:
                $result = $masterMaster->getName() . " lance un dé de " . count($masterMaster->getDice()->getFaces()) . " faces et obient le score de " . $masterMaster->diceTirage();
                break;
            case 3:
                if ($masterMaster->coinTirage() == 1)
                $result  = $masterMaster->getName() . " lance une pièce " . $masterMaster->getCoin()->getNbLancers() . " fois et obient le score de  100";
                else
                $result  = $masterMaster->getName() . " lance une pièce " . $masterMaster->getCoin()->getNbLancers() . " fois et obient le score de  0";

                break;
            default :
                return ("oops, il ne s'est rien passé, le maitre doit dormir...");

        }
return  $result;
    }
}