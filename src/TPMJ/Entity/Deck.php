<?php

namespace App\TPMJ\Entity;

class Deck
{

    private array $cardRanks;
    private array $color;

    public function __construct()
    {
        $this->cardRanks = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13];

        $this->color = [1, 2, 3, 4];
    }

    //la méthode retourne une carte modélisée par un array
    function pioche(): array
    {
        $colorFlip = $this->color[rand(0, 3)];
        $valueFlip = $this->cardRanks[rand(0, 12)];
        $result = [$colorFlip, $valueFlip];
        return $result;
    }

}

