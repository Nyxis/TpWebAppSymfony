<?php

namespace App\Entity;

class TirageAdapter
{
    private Deck $deck;


    function tirageCarteAdapter():int
    {
        $topcardValue = 1;
        $topcard = $this->deck->pioche();
        foreach ($topcard as $card) {
            $topcardValue *= $card();
        }
            return $topcardValue;

    }
}