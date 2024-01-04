<?php

namespace App\Service;

use App\Entity\Coin;
use App\Entity\Deck;
use App\Entity\Dice;

interface Tirage
{


    function diceTirage(): int;

    function deckTirage(): Int;

    function coinTirage (): bool;

}