<?php

namespace App\Service;

use App\Entity\Deck;

class TirageAdapter
{


    public static function tirageCarteAdapter(Deck $deck): int
    {
        $topcardValue = 1;
//        $topcard = $deck->pioche();
        $topcardValue = $deck->pioche()[0] * $deck->pioche()[1];
        return $topcardValue;

    }
}