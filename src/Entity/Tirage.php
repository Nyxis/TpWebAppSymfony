<?php

namespace App\Entity;

interface Tirage
{


    function diceTirage(Dice $dice): int;

    function deckTirage(TirageAdapter $tirageAdapter, Deck $deck): int;

    function coinTirage (Coin $coin): bool;

}