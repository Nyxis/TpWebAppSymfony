<?php

namespace App\Entity;


class Dice
{

    private array $faces;


    // construction avec 3 possibiltés aléatoires de faces
    public function __construct()
    {
        $nombreDeFacesPossible = [
            [1, 2, 3, 4, 5, 6],
            [1, 2, 3, 4, 5, 6, 7, 8, 9],
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
        ];
        $faces = $nombreDeFacesPossible[rand(0, 2)];
        $this->faces = $faces;
    }

    public function jet(): int
    {
        $result = $this->faces[rand(0, count($this->faces) - 1)];
        return $result;
    }

    public function getFaces(): array
    {
        return $this->faces;
    }

}