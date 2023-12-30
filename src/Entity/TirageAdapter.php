<?php

namespace App\Entity;

class TirageAdapter
{
    private $deck;


    public function __construct($deck)
    {
        $this->deck = $deck;
    }


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