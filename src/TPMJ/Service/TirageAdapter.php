<?php

namespace App\TPMJ\Service;

use App\TPMJ\Entity\Deck;


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