<?php

namespace App\Service;

class TirageAdapter
{
    private $deck;


    public function __construct($deck)
    {
        $this->deck = $deck;
    }

    //adapter : convertit la carte piochée par l'instance de Deck (array) en valeur (int)
    // comprise entre 1 et 52

    public static function tirageCarteAdapter($deck): int
    {
        $topcardValue = 1;
        $topcard = $deck->pioche();
        $topcardValue = $deck->pioche()[0] * $deck->pioche()[1];
        return $topcardValue;

    }
}