<?php

namespace App\Service\MjService;

use App\Entity\MjEntity\Deck;


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