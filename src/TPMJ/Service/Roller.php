<?php

namespace App\TPMJ\Service;

use App\TPMJ\Entity\Coin;
use App\TPMJ\Entity\Deck;
use App\TPMJ\Entity\Dice;
use App\TPMJ\Entity\Mj;

class Roller
{
    public static function rollForCrit(): string
    {


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
                $critRate = rand( 1, 10);
                $score = $masterMaster->diceTirage();
                $result = $masterMaster->getName() . " lance un dé de " . count($masterMaster->getDice()->getFaces()) . " faces et obient le score de " . $score;
                break;
            case 3:
                $critRate = 1;
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