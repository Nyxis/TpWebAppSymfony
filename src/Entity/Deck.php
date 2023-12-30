<?php

namespace App\Entity;

class Deck
{

    private array $cardRanks;
    private array $color ;

    public function __construct()
    {
        $this->cardRanks = [1,2,3,4,5,6,7,8,9,10,11,12,13];

        $this->color = [1, 2, 3 ,4];
    }

    function pioche(): array
    {
        $this->topCard = [
            [$this->color[rand(0,3)]],
            [$this->cardRanks[rand(0,12)]]
        ];
        return $this->topCard;
    }

}

