<?php

namespace App\Service;

class TirageAdapter
{
    private $deck;


    public function __construct($deck)
    {
        $this->deck = $deck;
    }


    public static function tirageCarteAdapter($deck):int
    {
        $topcardValue = 1;
        $topcard = $deck->pioche();
        $topcardValue = $deck->pioche()[0] *  $deck->pioche()[1];
            return $topcardValue;

    }
}