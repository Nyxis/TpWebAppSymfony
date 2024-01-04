<?php

namespace App\Service;

use App\Entity\Coin;
use App\Entity\Deck;
use App\Entity\Dice;
use App\Entity\Mj;

class Roller
{
    public static function rollForCrit(): string
    {

        $critRate = null;
        $deck = new Deck();
        $dice = new Dice();
        $coin = new Coin();

        $masterMaster = new Mj($deck, $dice, $coin);


        $roulette = rand(1, 3);

        switch ($roulette) {
            case 1:
                $critRate = rand( 1, 52);
                $score = $masterMaster->deckTirage();
                $result = $masterMaster->getName() . " tire une carte et obient le score de " . $score;
                break;
            case 2:
                $critRate = rand( 1, 17);
                $score = $masterMaster->diceTirage();
                $result = $masterMaster->getName() . " lance un dé de " . count($masterMaster->getDice()->getFaces()) . " faces et obient le score de " . $score;
                break;
            case 3:
                $critRate = rand( 0,1);
                $masterMaster->coinTirage() == 1 ? $score = 100
                    : $score = 0;

                $result = $masterMaster->getName() . " lance une pièce " .
                    $masterMaster->getCoin()->getNbLancers() . " fois et obient le score de " . $score;

                break;
            default :
                return ("oops, il ne s'est rien passé, le maitre doit dormir...");

        }
        if ($score > $critRate)
        {
            return $result . ", le critrate était de " . $critRate . ". PapixJux est trop fort." ;
        }
        elseif ($score < $critRate)
        {

            return $result . ", le critrate était de " . $critRate . ". PapixJux est trop nul." ;
        }
        else
        {
            return $result . ", le critrate était de " . $critRate . ". C'est un coup pour rien." ;
        }
    }
}